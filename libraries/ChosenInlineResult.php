<?php

namespace packages\telebot;

class ChosenInlineResult extends Type
{
    /**
     * The unique identifier for the result that was chosen.
     *
     * @var string
     */
    protected $resultId;

    /**
     * Sender.
     *
     * @var User
     */
    protected $from;

    /**
     * Sender location, only for bots that require user location.
     *
     * @var Location|null
     */
    protected $location;

    /**
     * Identifier of the sent inline message.
     * Available only if there is an inline keyboard attached to the message.
     * Will be also received in callback queries and can be used to edit the message.
     *
     * @var string|null
     */
    protected $inlineMessageId;

    /**
     * The data that was used to obtain the result.
     *
     * @var string
     */
    protected $data;

    /**
     * @var string
     */
    private $id;

    public function __construct(string $resultId, User $from, string $data)
    {
        $this->resultId = $resultId;
        $this->from = $from;
        $this->data = $data;
    }

    public static function fromJson($data)
    {
        $object = new self($data->id, User::fromJson($data->from), $data->data);
        if (isset($data->location)) {
            $object->location = Location::fromJson($data->location);
        }
        if (isset($data->inline_message_id)) {
            $object->inlineMessageId = $data->inline_message_id;
        }

        return $object;
    }

    public function toJson()
    {
        $data = [
            'id' => $this->id,
            'from' => $this->from->toJson(),
            'data' => $this->data,
        ];
        if ($this->inlineMessageId) {
            $data['inline_message_id'] = $this->inlineMessageId;
        }
        if ($this->location) {
            $data['location'] = $this->location->toJson();
        }

        return $data;
    }

    /**
     * Get the unique identifier for the result that was chosen.
     */
    public function getResultId(): string
    {
        return $this->resultId;
    }

    /**
     * Set the unique identifier for the result that was chosen.
     *
     * @param string $resultId the unique identifier for the result that was chosen
     *
     * @return void
     */
    public function setResultId(string $resultId)
    {
        $this->resultId = $resultId;
    }

    /**
     * Get sender.
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * Set sender.
     *
     * @param User $from Sender
     *
     * @return void
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
    }

    /**
     * Get sender location, only for bots that require user location.
     *
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set sender location, only for bots that require user location.
     *
     * @param Location|null $location Sender location, only for bots that require user location
     *
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get will be also received in callback queries and can be used to edit the message.
     *
     * @return string|null
     */
    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    /**
     * Set will be also received in callback queries and can be used to edit the message.
     *
     * @param string|null $inlineMessageId will be also received in callback queries and can be used to edit the message
     *
     * @return void
     */
    public function setInlineMessageId($inlineMessageId)
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * Get the data that was used to obtain the result.
     */
    public function getQuery(): string
    {
        return $this->data;
    }

    /**
     * Set the data that was used to obtain the result.
     *
     * @param string $data the data that was used to obtain the result
     *
     * @return void
     */
    public function setQuery(string $data)
    {
        $this->data = $data;
    }
}
