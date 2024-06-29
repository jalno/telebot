<?php

namespace packages\telebot;

class SendMessage extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string|null
     */
    protected $parseMode;

    /**
     * @var bool
     */
    protected $disablePreview = false;

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

    public function __construct($chatId, string $text)
    {
        $this->chatId = $chatId;
        $this->text = $text;
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
     * @return void
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string|null $parseMode
     *
     * @return void
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return string|null
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * @return void
     */
    public function setDisablePreview(bool $disablePreview)
    {
        $this->disablePreview = $disablePreview;
    }

    public function getDisablePreview(): bool
    {
        return $this->disablePreview;
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
            'text' => $this->text,
            'parse_mode' => $this->parseMode,
            'disable_web_page_preview' => $this->disablePreview,
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
