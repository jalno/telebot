<?php
namespace packages\telebot;
class InlineQueryResultArticle extends InlineQueryResult {
	/**
     * URL of the result
     *
     * @var string|null
     */
	protected $url;
	
    /**
     * Pass True, if you don't want the URL to be shown in the message
     *
     * @var bool
     */
	protected $hideUrl = false;
	
    /**
     * Short description of the result
     *
     * @var string|null
     */
	protected $description;
	
    /**
     * Url of the thumbnail for the result
     *
     * @var string|null
     */
	protected $thumbUrl;
	
    /**
     * Thumbnail width
     *
     * @var int|null
     */
	protected $thumbWidth;
	
    /**
     * Thumbnail height
     *
     * @var int|null
     */
	protected $thumbHeight;
	
	public function __construct(string $id, string $title, InputMessageContent $inputMessageContent){
		parent::__construct('article', $id, $title);
		$this->setInputMessageContent($inputMessageContent);
	}
	
	public static function fromJson($data) {
		$object = new self($data->id, $data->title, InputMessageContent::fromJson($data->input_message_content));
		if (isset($data->reply_markup)) {
			$object->replyMarkup = InlineKeyboardMarkup::fromJson($data->reply_markup);
		}
		if (isset($data->url)) {
			$object->url = $data->url;
		}
		if (isset($data->hide_url)) {
			$object->hideUrl = $data->hide_url;
		}
		if (isset($data->description)) {
			$object->description = $data->description;
		}
		if (isset($data->thumb_url)) {
			$object->thumbUrl = $data->thumb_url;
		}
		if (isset($data->thumb_width)) {
			$object->thumbWidth = $data->thumb_width;
		}
		if (isset($data->thumb_height)) {
			$object->thumbHeight = $data->thumb_height;
		}
		return $object;
	}
	public function toJson() {
		$data = parent::toJson();
		if ($this->url) {
			$data['url'] = $this->url;
		}
		if ($this->hideUrl) {
			$data['hide_url'] = $this->hideUrl;
		}
		if ($this->description) {
			$data['description'] = $this->description;
		}
		if ($this->thumbUrl) {
			$data['thumb_url'] = $this->thumbUrl;
		}
		if ($this->thumbUrl) {
			$data['thumb_width'] = $this->thumbWidth;
		}
		if ($this->thumbUrl) {
			$data['thumb_height'] = $this->thumbHeight;
		}
		return $data;
	}

	/**
	 * Get uRL of the result
	 *
	 * @return  string|null
	 */ 
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Set uRL of the result
	 *
	 * @param  string|null  $url  URL of the result
	 * @return  void
	 */ 
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Get pass True, if you don't want the URL to be shown in the message
	 *
	 * @return  bool
	 */ 
	public function getHideUrl(): bool {
		return $this->hideUrl;
	}

	/**
	 * Set pass True, if you don't want the URL to be shown in the message
	 *
	 * @param  bool  $hideUrl  Pass True, if you don't want the URL to be shown in the message
	 * @return  void
	 */ 
	public function setHideUrl(bool $hideUrl) {
		$this->hideUrl = $hideUrl;
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
	 * Get url of the thumbnail for the result
	 *
	 * @return  string|null
	 */ 
	public function getThumbUrl() {
		return $this->thumbUrl;
	}

	/**
	 * Set url of the thumbnail for the result
	 *
	 * @param  string|null  $thumbUrl  Url of the thumbnail for the result
	 * @return  void
	 */ 
	public function setThumbUrl($thumbUrl) {
		$this->thumbUrl = $thumbUrl;
	}

	/**
	 * Get thumbnail width
	 *
	 * @return  int|null
	 */ 
	public function getThumbWidth() {
		return $this->thumbWidth;
	}

	/**
	 * Set thumbnail width
	 *
	 * @param  int|null  $thumbWidth  Thumbnail width
	 * @return  void
	 */ 
	public function setThumbWidth($thumbWidth) {
		$this->thumbWidth = $thumbWidth;
	}

	/**
	 * Get thumbnail height
	 *
	 * @return  int|null
	 */ 
	public function getThumbHeight() {
		return $this->thumbHeight;
	}

	/**
	 * Set thumbnail height
	 *
	 * @param  int|null  $thumbHeight  Thumbnail height
	 * @return  void
	 */ 
	public function setThumbHeight($thumbHeight) {
		$this->thumbHeight = $thumbHeight;
	}
}
