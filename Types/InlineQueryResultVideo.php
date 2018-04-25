<?php
namespace packages\telebot;
class InlineQueryResultVideo extends InlineQueryResult {
	/**
     * A valid URL for the embedded video player or video file
     *
     * @var string
     */
	protected $url;

	/**
     * Mime type of the content of video url, “text/html” or “video/mp4”
     *
     * @var string
     */
	protected $mimeType;
	
    /**
     * URL of the thumbnail (jpeg only) for the video
     *
     * @var string
     */
	protected $thumbUrl;
	
    /**
     * Width of the Video
     *
     * @var int|null
     */
	protected $width;

    /**
     * Height of the Video
     *
     * @var int|null
     */
	protected $height;

    /**
     * Duration of the Video
     *
     * @var int|null
     */
	protected $duration;

    /**
	 * Caption of the Video to be sent, 0-200 characters
	 * 
     * @var string|null
     */
	protected $caption;

    /**
	 * Short description of the result
	 * 
     * @var string|null
     */
	protected $description;

    /**
	 * Send Markdown or HTML, if you want Telegram apps to show bold, italic,
	 * fixed-width text or inline URLs in the media caption.
	 * 
     * @var string|null
     */
	protected $parseMode;
	
	
	public function __construct(string $id, string $title, string $url, string $mimeType, string $thumbUrl){
		parent::__construct('video', $id, $title);
		$this->url = $url;
		$this->thumbUrl = $thumbUrl;
		$this->mimeType = $mimeType;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->title, $data->video_url,$data->mime_type, $data->thumb_url);
		if (isset($data->video_width)) {
			$object->width = $data->video_width;
		}
		if (isset($data->video_height)) {
			$object->height = $data->video_height;
		}
		if (isset($data->video_duration)) {
			$object->duration = $data->video_duration;
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
	public function toJson() {
		$data = parent::toJson();
		if ($this->url) {
			$data['video_url'] = $this->url;
		}
		if ($this->mimeType) {
			$data['mime_type'] = $this->mimeType;
		}
		if ($this->thumbUrl) {
			$data['thumb_url'] = $this->thumbUrl;
		}
		if ($this->width) {
			$data['video_width'] = $this->width;
		}
		if ($this->height) {
			$data['video_height'] = $this->height;
		}
		if ($this->duration) {
			$data['video_duration'] = $this->duration;
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
	 * Get a valid URL for the embedded video player or video file
	 *
	 * @return  string
	 */ 
	public function getUrl(): string {
		return $this->url;
	}

	/**
	 * Set a valid URL for the embedded video player or video file
	 *
	 * @param  string  $url  A valid URL for the embedded video player or video file
	 * @return  void
	 */ 
	public function setUrl(string $url) {
		$this->url = $url;
	}

	/**
	 * Get mime type of the content of video url, “text/html” or “video/mp4”
	 *
	 * @return  string
	 */ 
	public function getMimeType(): string {
		return $this->mimeType;
	}

	/**
	 * Set mime type of the content of video url, “text/html” or “video/mp4”
	 *
	 * @param  string  $mimeType  Mime type of the content of video url, “text/html” or “video/mp4”
	 * @return  void
	 */ 
	public function setMimeType(string $mimeType) {
		$this->mimeType = $mimeType;
	}

	/**
	 * Get uRL of the thumbnail (jpeg only) for the video
	 *
	 * @return  string
	 */ 
	public function getThumbUrl(): string {
		return $this->thumbUrl;
	}

	/**
	 * Set uRL of the thumbnail (jpeg only) for the video
	 *
	 * @param  string  $thumbUrl  URL of the thumbnail (jpeg only) for the video
	 * @return  void
	 */ 
	public function setThumbUrl(string $thumbUrl) {
		$this->thumbUrl = $thumbUrl;
	}

	/**
	 * Get width of the Video
	 *
	 * @return  int|null
	 */ 
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Set width of the Video
	 *
	 * @param  int|null  $width  Width of the Video
	 * @return  void
	 */ 
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Get height of the Video
	 *
	 * @return  int|null
	 */ 
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Set height of the Video
	 *
	 * @param  int|null  $height  Height of the Video
	 * @return  void
	 */ 
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * Get duration of the Video
	 *
	 * @return  int|null
	 */ 
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Set duration of the Video
	 *
	 * @param  int|null  $duration  Duration of the Video
	 * @return  void
	 */ 
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Get caption of the Video to be sent, 0-200 characters
	 *
	 * @return  string|null
	 */ 
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Set caption of the Video to be sent, 0-200 characters
	 *
	 * @param  string|null  $caption  Caption of the Video to be sent, 0-200 characters
	 * @return  void
	 */ 
	public function setCaption($caption) {
		$this->caption = $caption;
	}

	/**
	 * Get short description of the result
	 *
	 * @return  string|null
	 */ 
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set short description of the result
	 *
	 * @param  string|null  $description  Short description of the result
	 * @return  void
	 */ 
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Get fixed-width text or inline URLs in the media caption.
	 *
	 * @return  string|null
	 */ 
	public function getParseMode() {
		return $this->parseMode;
	}

	/**
	 * Set fixed-width text or inline URLs in the media caption.
	 *
	 * @param  string|null  $parseMode  fixed-width text or inline URLs in the media caption.
	 * @return  void
	 */ 
	public function setParseMode($parseMode) {
		$this->parseMode = $parseMode;
	}
}
