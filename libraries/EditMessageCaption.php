<?php

namespace packages\telebot;

class EditMessageCaption extends Method
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
     * @var string
     */
    protected $caption;

    /**
     * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
    protected $replyMarkup;

    /**
     * @var int|null
     */
    protected $inlineMessageId;

    public function __construct($chatId, int $messageId, string $caption)
    {
        $this->chatId = $chatId;
        $this->messageId = $messageId;
        $this->caption = $caption;
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
     * @return void
     */
    public function setCaption(string $caption)
    {
        $this->caption = $caption;
    }

    public function getCaption(): string
    {
        return $this->caption;
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
     * Get the value of inlineMessageId.
     *
     * @return int|null
     */
    public function getInlineMessageId()
    {
        return $this->inlineMessageId;
    }

    /**
     * Set the value of inlineMessageId.
     *
     * @param int|null $inlineMessageId
     *
     * @return void
     */
    public function setInlineMessageId($inlineMessageId)
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'caption' => $this->caption,
            'inline_message_id' => $this->inlineMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
        ];
    }

    public function handleResponse($response)
    {
        return Message::fromJson($response);
    }
}
