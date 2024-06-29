<?php

namespace packages\telebot;

class InlineQueryResultDocument extends InlineQueryResult
{
    /**
     * A valid URL for the file.
     *
     * @var string
     */
    protected $url;

    /**
     * Mime type of the content of the file, either "application/pdf" or "application/zip".
     *
     * @var string
     */
    protected $mimeType;

    /**
     * Caption of the document to be sent, 0-200 characters.
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Short description of the result.
     *
     * @var string|null
     */
    protected $description;

    /**
     * URL of the thumbnail (jpeg only) for the document.
     *
     * @var string|null
     */
    protected $thumbUrl;

    /**
     * @var int|null
     */
    protected $thumbWidth;
    /**
     * @var int|null
     */
    protected $thumbHeight;

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     */
    protected $parseMode;

    public function __construct(string $id, string $title, string $url, string $mimeType)
    {
        parent::__construct('document', $id, $title);
        $this->url = $url;
        $this->mimeType = $mimeType;
    }

    public static function fromJson($data)
    {
        $object = new self($data->id, $data->title, $data->document_url, $data->mime_type);
        if (isset($data->thumb_url)) {
            $object->thumbUrl = $data->thumb_url;
        }
        if (isset($data->thumb_width)) {
            $object->thumbWidth = $data->thumb_width;
        }
        if (isset($data->thumb_height)) {
            $object->thumbHeight = $data->thumb_height;
        }
        if (isset($data->title)) {
            $object->title = $data->title;
        }
        if (isset($data->caption)) {
            $object->caption = $data->caption;
        }
        if (isset($data->description)) {
            $object->description = $data->description;
        }
        if (isset($data->parse_mode)) {
            $object->parseMode = $data->parse_mode;
        }
        if (isset($data->reply_markup)) {
            $object->replyMarkup = InlineKeyboardMarkup::fromJson($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $object->inputMessageContent = InputMessageContent::fromJson($data->input_message_content);
        }

        return $object;
    }

    public function toJson()
    {
        $data = parent::toJson();
        if ($this->url) {
            $data['document_url'] = $this->url;
        }
        if ($this->mimeType) {
            $data['mime_type'] = $this->mimeType;
        }
        if ($this->thumbUrl) {
            $data['thumb_url'] = $this->thumbUrl;
        }
        if ($this->thumbWidth) {
            $data['thumb_width'] = $this->thumbWidth;
        }
        if ($this->thumbHeight) {
            $data['thumb_height'] = $this->thumbHeight;
        }
        if ($this->caption) {
            $data['caption'] = $this->caption;
        }
        if ($this->description) {
            $data['description'] = $this->description;
        }
        if ($this->parseMode) {
            $data['parse_mode'] = $this->parseMode;
        }

        return $data;
    }

    /**
     * Get a valid URL for the file.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set a valid URL for the file.
     *
     * @param string $url A valid URL for the file
     *
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get mime type of the content of the file, either "application/pdf" or "application/zip".
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * Set mime type of the content of the file, either "application/pdf" or "application/zip".
     *
     * @param string $mimeType Mime type of the content of the file, either "application/pdf" or "application/zip"
     *
     * @return void
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * Get caption of the document to be sent, 0-200 characters.
     *
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set caption of the document to be sent, 0-200 characters.
     *
     * @param string|null $caption Caption of the document to be sent, 0-200 characters
     *
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * Get short description of the result.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set short description of the result.
     *
     * @param string|null $description Short description of the result
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get uRL of the thumbnail (jpeg only) for the document.
     *
     * @return string|null
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * Set uRL of the thumbnail (jpeg only) for the document.
     *
     * @param string|null $thumbUrl URL of the thumbnail (jpeg only) for the document
     *
     * @return void
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * Get the value of thumbWidth.
     *
     * @return int|null
     */
    public function getThumbWidth()
    {
        return $this->thumbWidth;
    }

    /**
     * Set the value of thumbWidth.
     *
     * @param int|null $thumbWidth
     *
     * @return void
     */
    public function setThumbWidth($thumbWidth)
    {
        $this->thumbWidth = $thumbWidth;
    }

    /**
     * Get the value of thumbHeight.
     *
     * @return int|null
     */
    public function getThumbHeight()
    {
        return $this->thumbHeight;
    }

    /**
     * Set the value of thumbHeight.
     *
     * @param int|null $thumbHeight
     *
     * @return void
     */
    public function setThumbHeight($thumbHeight)
    {
        $this->thumbHeight = $thumbHeight;
    }

    /**
     * Get fixed-width text or inline URLs in the media caption.
     *
     * @return string|null
     */
    public function getParseMode()
    {
        return $this->parseMode;
    }

    /**
     * Set fixed-width text or inline URLs in the media caption.
     *
     * @param string|null $parseMode fixed-width text or inline URLs in the media caption
     *
     * @return void
     */
    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }
}
