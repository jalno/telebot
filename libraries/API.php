<?php

namespace packages\telebot;

use packages\base\Cache;
use packages\base\Events;
use packages\base\HTTP;
use packages\base\IO\File;
use packages\base\Json;

class API
{
    protected $token;
    protected $http;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->http = new HTTP\Client([
            'base_uri' => $this->getURL(),
        ]);
    }

    /**
     * Call a method.
     *
     * @throws HTTP\ClientException
     * @throws HTTP\ServerException
     * @throws \packages\telebot\Exception
     * @throws InvalidJsonException
     */
    public function call(Method $method)
    {
        $name = substr(get_class($method), strrpos(get_class($method), '\\') + 1);
        $params = $method->toJson();
        $multipart = [];
        foreach ($params as $key => $value) {
            if (null !== $value) {
                if (is_array($value)) {
                    $multipart[$key] = Json\encode($value);
                } else {
                    $multipart[$key] = $value;
                }
            }
        }
        $hasFile = $this->lookForFile($multipart);
        if ($hasFile) {
            $response = $this->http->post('/'.$name, [
                'multipart' => $multipart,
            ]);
        } else {
            $response = $this->http->post('/'.$name, [
                'json' => $multipart,
            ]);
        }
        $json = Json\decode($response->getBody(), false);
        if (false === $json) {
            throw new Json\JsonException();
        }
        if (!$json->ok) {
            throw new \Exception($json->description, $json->error_code);
        }

        return $method->handleResponse($json->result);
    }

    public function handleWebhock()
    {
        $data = file_get_contents('php://input');
        $json = json\decode($data, false);
        $this->handleJsonWebhock($json);
    }

    public function handleJsonWebhock($json)
    {
        $update = Update::fromJson($json);
        $update->setBot($this);
        Events::trigger($update);
    }

    public function getUpdate($offset = null, $limit = 100, $timeout = 0)
    {
        if (null === $offset) {
            $offset = (int) Cache::get('packages.telebot.'.$this->token.'.lastupdate');
            if ($offset) {
                ++$offset;
            }
        }
        $method = new GetUpdates($offset, $limit, $timeout);
        $updates = $this->call($method);
        if ($updates) {
            foreach ($updates as $update) {
                if ($update->getId() > $offset) {
                    $offset = $update->getId();
                }
            }
            Cache::set('packages.telebot.'.$this->token.'.lastupdate', $offset, 86400 * 7);
        }

        return $updates;
    }

    /**
     * Get the value of bot token.
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    protected function getURL()
    {
        return 'https://api.telegram.org/bot'.$this->token;
    }

    /**
     * look in $params and search for instance of io\file.
     *
     * @return bool
     */
    protected function lookForFile($params)
    {
        foreach ($params as $value) {
            if (is_array($value)) {
                $found = $this->lookForFile($value);
            } else {
                $found = $value instanceof File;
            }
            if ($found) {
                return true;
            }
        }

        return false;
    }
}
