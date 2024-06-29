<?php

namespace packages\telebot;

abstract class InlineQueryResult extends Type
{
    /**
     * Type of the result, must be one of: article, photo, gif, mpeg4_gif, video.
     *
     * @var string
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes.
     *
     * @var string
     */
    protected $id;

    /**
     * Title for the result.
     *
     * @var string
     */
    protected $title;

    /**
     * Content of the message to be sent instead of the file.
     *
     * @var InputMessageContent|null
     */
    protected $inputMessageContent;

    /**
     * Inline keyboard attached to the message.
     *
     * @var InlineKeyboardMarkup|null
     */
    protected $replyMarkup;

    /**
     * InlineQueryResult constructor.
     */
    public function __construct(string $type, string $id, string $title)
    {
        $this->type = $type;
        $this->id = $id;
        $this->title = $title;
    }

    public function toJson()
    {
        $json = [
            'type' => $this->type,
            'id' => $this->id,
            'title' => $this->title,
        ];
        if ($this->inputMessageContent) {
            $json['input_message_content'] = $this->inputMessageContent->toJson();
        }
        if ($this->replyMarkup) {
            $json['reply_markup'] = $this->replyMarkup->toJson();
        }
    }

    /**
     * Get type of the result, must be one of: article, photo, gif, mpeg4_gif, video.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set type of the result, must be one of: article, photo, gif, mpeg4_gif, video.
     *
     * @param string $type Type of the result
     *
     * @return void
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * Get unique identifier for this result, 1-64 bytes.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set unique identifier for this result, 1-64 bytes.
     *
     * @param string $id Unique identifier for this result, 1-64 bytes
     *
     * @return void
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * Get title for the result.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set title for the result.
     *
     * @param string $title Title for the result
     *
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get content of the message to be sent instead of the file.
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent()
    {
        return $this->inputMessageContent;
    }

    /**
     * Set content of the message to be sent instead of the file.
     *
     * @param InputMessageContent|null $inputMessageContent Content of the message to be sent instead of the file
     *
     * @return void
     */
    public function setInputMessageContent($inputMessageContent)
    {
        $this->inputMessageContent = $inputMessageContent;
    }

    /**
     * Get inline keyboard attached to the message.
     *
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup()
    {
        return $this->replyMarkup;
    }

    /**
     * Set inline keyboard attached to the message.
     *
     * @param InlineKeyboardMarkup|null $replyMarkup Inline keyboard attached to the message
     *
     * @return void
     */
    public function setReplyMarkup($replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }
}
