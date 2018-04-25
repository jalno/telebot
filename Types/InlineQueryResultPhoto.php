<?php
namespace packages\telebot;
class InlineQueryResultPhoto extends InlineQueryResult {
	/**
     * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
     *
     * @var string
     */
	protected $url;
	
    /**
     * URL of the thumbnail for the photo
     *
     * @var string
     */
	protected $thumbUrl;
	
    /**
     * Width of the photo
     *
     * @var int|null
     */
	protected $width;
    /**
     * Height of the photo
     *
     * @var int|null
     */
	protected $height;

    /**
	 * Short description of the result
	 * 
     * @var string|null
     */
	protected $description;

    /**
	 * Caption of the photo to be sent, 0-200 characters
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
	
	
	public function __construct(string $id, string $url, string $thumbUrl){
		parent::__construct('photo', $id, '');
		$this->url = $url;
		$this->thumbUrl = $thumbUrl;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->photo_url, $data->thumb_url);
		if (isset($data->photo_width)) {
			$object->width = $data->photo_width;
		}
		if (isset($data->photo_height)) {
			$object->height = $data->photo_height;
		}
		if (isset($data->title)) {
			$object->title = $data->title;
		}
		if (isset($data->description)) {
			$object->description = $data->description;
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
	public function toJson() {
		$data = parent::toJson();
		if ($this->url) {
			$data['photo_url'] = $this->url;
		}
		if ($this->thumbUrl) {
			$data['thumb_url'] = $this->thumbUrl;
		}
		if ($this->width) {
			$data['photo_width'] = $this->width;
		}
		if ($this->height) {
			$data['photo_height'] = $this->height;
		}
		if ($this->description) {
			$data['description'] = $this->description;
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
	 * Get a valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
	 *
	 * @return  string
	 */ 
	public function getUrl(): string {
		return $this->url;
	}

	/**
	 * Set a valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
	 *
	 * @param  string  $url  A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
	 * @return  void
	 */ 
	public function setUrl($url): string {
		$this->url = $url;
	}

	/**
	 * Get uRL of the thumbnail for the photo
	 *
	 * @return  string
	 */ 
	public function getThumbUrl(): string {
		return $this->thumbUrl;
	}

	/**
	 * Set uRL of the thumbnail for the photo
	 *
	 * @param  string  $thumbUrl  URL of the thumbnail for the photo
	 * @return  void
	 */ 
	public function setThumbUrl(string $thumbUrl) {
		$this->thumbUrl = $thumbUrl;
	}

	/**
	 * Get width of the photo
	 *
	 * @return  int|null
	 */ 
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Set width of the photo
	 *
	 * @param  int|null  $width  Width of the photo
	 * @return  void
	 */ 
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Get height of the photo
	 *
	 * @return  int|null
	 */ 
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Set height of the photo
	 *
	 * @param  int|null  $height  Height of the photo
	 * @return  void
	 */ 
	public function setHeight($height) {
		$this->height = $height;
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
	 * Get caption of the photo to be sent, 0-200 characters
	 *
	 * @return  string|null
	 */ 
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Set caption of the photo to be sent, 0-200 characters
	 *
	 * @param  string|null  $caption  Caption of the photo to be sent, 0-200 characters
	 * @return  void
	 */ 
	public function setCaption($caption) {
		$this->caption = $caption;
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
