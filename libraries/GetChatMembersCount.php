<?php

namespace packages\telebot;

class GetChatMembersCount extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @param int|string $chatId
     *
     * @return void
     */
    public function setChatID($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @return int|string
     */
    public function getChatID()
    {
        return $this->chatId;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
        ];
    }

    /**
     * @return int
     */
    public function handleResponse($response)
    {
        return $response;
    }
}
