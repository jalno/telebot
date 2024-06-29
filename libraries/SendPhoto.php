<?php

namespace packages\telebot;

use packages\base\IO\File;

class SendPhoto extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    /**
     * @var File
     */
    protected $photo;

    /**
     * @var string|null
     */
    protected $caption;

    /**
     * @var string|null
     */
    protected $parseMode;

    /**
     * @var int|null
     */
    protected $replyToMessageId;

    /**
     * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
    protected $replyMarkup;

    /**
     * @var bool
     */
    protected $disableNotification = false;

    public function __construct($chatId, File $photo)
    {
        $this->chatId = $chatId;
        $this->photo = $photo;
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
     * Get the value of photo.
     */
    public function getPhoto(): File
    {
        return $this->photo;
    }

    /**
     * Set the value of photo.
     *
     * @return void
     */
    public function setPhoto(File $photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get the value of caption.
     *
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set the value of caption.
     *
     * @param string|null $caption
     *
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * Get the value of parseMode.
     *
     * @return string|null
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * Set the value of parseMode.
     *
     * @param string|null $parseMode
     *
     * @return void
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @param int|null $replyToMessageId
     *
     * @return void
     */
    public function setReplyToMessageId($replyToMessageId)
    {
        $this->replyToMessageId = $replyToMessageId;
    }

    /**
     * @return int|null
     */
    public function getReplyToMessageId()
    {
        return $this->replyToMessageId;
    }

    /**
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return void
     */
    public function setReplyMarkup($replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }

    /**
     * @return InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
    public function getReplyMarkup()
    {
        return $this->replyMarkup;
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
            'photo' => $this->photo,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
        ];
    }

    public function handleResponse($response)
    {
        return Message::fromJson($response);
    }
}
