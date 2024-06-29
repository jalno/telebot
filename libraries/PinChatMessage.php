<?php

namespace packages\telebot;

class PinChatMessage extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    /**
     * @var int
     */
    protected $messageId;

    /**
     * @var bool
     */
    protected $disableNotification;

    public function __construct($chatId, int $messageId)
    {
        $this->chatId = $chatId;
        $this->messageId = $messageId;
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

    /**
     * Get the value of messageId.
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * Set the value of messageId.
     *
     * @return void
     */
    public function setMessageId(int $messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * Get the value of disableNotification.
     */
    public function getDisableNotification(): bool
    {
        return $this->disableNotification;
    }

    /**
     * Set the value of disableNotification.
     *
     * @return void
     */
    public function setDisableNotification(bool $disableNotification)
    {
        $this->disableNotification = $disableNotification;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'disable_notification' => $this->disableNotification,
        ];
    }

    public function handleResponse($response)
    {
        return $response;
    }
}
