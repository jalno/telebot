<?php

namespace packages\telebot;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user
 * (act as if the user has selected the bot‘s message and tapped ’Reply').This can be extremely useful
 * if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 */
class ForceReply extends Type
{
    /**
     * @var bool
     */
    protected $forceReply;

    /**
     * @var bool
     */
    protected $selective;

    public function __construct(bool $forceReply)
    {
        $this->forceReply = $forceReply;
    }

    public static function fromJson($data)
    {
        $object = new self($data->force_reply);
        if (isset($data->selective)) {
            $object->selective = $data->selective;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'force_reply' => $this->forceReply,
            'selective' => $this->selective,
        ];
    }

    /**
     * Get the value of forceReply.
     */
    public function getForceReply(): bool
    {
        return $this->forceReply;
    }

    /**
     * Set the value of forceReply.
     *
     * @return void
     */
    public function setForceReply(bool $forceReply)
    {
        $this->forceReply = $forceReply;
    }

    /**
     * Get the value of selective.
     */
    public function getSelective(): bool
    {
        return $this->selective;
    }

    /**
     * Set the value of selective.
     *
     * @return void
     */
    public function setSelective(bool $selective)
    {
        $this->selective = $selective;
    }
}
