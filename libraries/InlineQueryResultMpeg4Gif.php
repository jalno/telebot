<?php

namespace packages\telebot;

class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    /**
     * A valid URL for the MP4 file. File size must not exceed 1MB.
     *
     * @var string
     */
    protected $url;

    /**
     * URL of the static thumbnail for the result (jpeg or gif).
     *
     * @var string
     */
    protected $thumbUrl;

    /**
     * Width of the Video.
     *
     * @var int|null
     */
    protected $width;

    /**
     * Height of the Video.
     *
     * @var int|null
     */
    protected $height;

    /**
     * Duration of the Video.
     *
     * @var int|null
     */
    protected $duration;

    /**
     * Caption of the Video to be sent, 0-200 characters.
     *
     * @var string|null
     */
    protected $caption;

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     */
    protected $parseMode;

    public function __construct(string $id, string $url, string $thumbUrl)
    {
        parent::__construct('mpeg4_gif', $id, '');
        $this->url = $url;
        $this->thumbUrl = $thumbUrl;
    }

    public static function fromJson($data)
    {
        $object = new self($data->id, $data->mpeg4_url, $data->thumb_url);
        if (isset($data->mpeg4_width)) {
            $object->width = $data->mpeg4_width;
        }
        if (isset($data->mpeg4_height)) {
            $object->height = $data->mpeg4_height;
        }
        if (isset($data->mpeg4_duration)) {
            $object->duration = $data->mpeg4_duration;
        }
        if (isset($data->title)) {
            $object->title = $data->title;
        }
        if (isset($data->caption)) {
            $object->caption = $data->caption;
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
            $data['mpeg4_url'] = $this->url;
        }
        if ($this->thumbUrl) {
            $data['thumb_url'] = $this->thumbUrl;
        }
        if ($this->width) {
            $data['mpeg4_width'] = $this->width;
        }
        if ($this->height) {
            $data['mpeg4_height'] = $this->height;
        }
        if ($this->duration) {
            $data['mpeg4_duration'] = $this->duration;
        }
        if ($this->caption) {
            $data['caption'] = $this->caption;
        }
        if ($this->parseMode) {
            $data['parse_mode'] = $this->parseMode;
        }

        return $data;
    }

    /**
     * Get a valid URL for the Video file. File size must not exceed 1MB.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set a valid URL for the Video file. File size must not exceed 1MB.
     *
     * @param string $url A valid URL for the Video file. File size must not exceed 1MB
     *
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get uRL of the static thumbnail for the result (jpeg or gif).
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    /**
     * Set uRL of the static thumbnail for the result (jpeg or gif).
     *
     * @param string $thumbUrl URL of the static thumbnail for the result (jpeg or gif)
     *
     * @return void
     */
    public function setThumbUrl(string $thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    /**
     * Get width of the Video.
     *
     * @return int|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set width of the Video.
     *
     * @param int|null $width Width of the Video
     *
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get height of the Video.
     *
     * @return int|null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set height of the Video.
     *
     * @param int|null $height Height of the Video
     *
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get duration of the Video.
     *
     * @return int|null
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set duration of the Video.
     *
     * @param int|null $duration Duration of the Video
     *
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get caption of the photo to be sent, 0-200 characters.
     *
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set caption of the photo to be sent, 0-200 characters.
     *
     * @param string|null $caption Caption of the photo to be sent, 0-200 characters
     *
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
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
