<?php

namespace packages\telebot;

class ForwardMessage extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    /**
     * @var int
     */
    protected $fromChatId;

    /**
     * @var int
     */
    protected $messageId;

    /**
     * @var bool
     */
    protected $disableNotification = false;

    public function __construct($chatId, int $fromChatId, int $messageId)
    {
        $this->chatId = $chatId;
        $this->fromChatId = $fromChatId;
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
     * @return int
     */
    public function getChatID()
    {
        return $this->chatId;
    }

    /**
     * Get the value of fromChatId.
     */
    public function getFromChatId(): int
    {
        return $this->fromChatId;
    }

    /**
     * Set the value of fromChatId.
     *
     * @return void
     */
    public function setFromChatId(int $fromChatId)
    {
        $this->fromChatId = $fromChatId;
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
     * @return void
     */
    public function setDisableNotification(bool $disableNotification)
    {
        $this->disableNotification = $disableNotification;
    }

    public function getDisableNotification(): bool
    {
        return $this->disableNotification;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
            'fromChatId' => $this->fromChatId,
            'message_id' => $this->messageId,
            'disable_notification' => $this->disableNotification,
        ];
    }

    public function handleResponse($response)
    {
        return Message::fromJson($response);
    }
}
