<?php
namespace packages\telebot;
class InputMediaVideo extends InputMedia {
	/**
	 * Video width.
	 * @var int|null
	 */
	protected $width;

	/**
	 * Video height.
	 * @var int|null
	 */
	protected $height;

	/**
     * Video duration.
     *
     * @var int|null
     */
	protected $duration;
	/**
     * Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool
     */
	
	protected $supportsStreaming = false;

	public function __construct($media) {
		parent::__construct('video', $media);
	}
	
	public static function fromJson($data) {
		$object = new static($data->media);
		if (isset($data->caption)) {
			$object->caption = $data->caption;
		}
		if (isset($data->parse_mode)) {
			$object->parseMode = $data->parse_mode;
		}
		return $object;
	}

	public function toJson() {
		$json = parent::toJson();
		if ($this->width) {
			$json['width'] = $this->width;
		}
		if ($this->height) {
			$json['height'] = $this->height;
		}
		if ($this->duration) {
			$json['duration'] = $this->duration;
		}
		if ($this->supportsStreaming) {
			$json['supports_streaming'] = $this->supportsStreaming;
		}
	}

	/**
	 * Get video width.
	 *
	 * @return  int|null
	 */ 
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Set video width.
	 *
	 * @param  int|null  $width  Video width.
	 * @return  void
	 */ 
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Get video height.
	 *
	 * @return  int|null
	 */ 
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Set video height.
	 *
	 * @param  int|null  $height  Video height.
	 * @return  void
	 */ 
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * Get video duration.
	 *
	 * @return  int|null
	 */ 
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Set video duration.
	 *
	 * @param  int|null  $duration  Video duration.
	 * @return  void
	 */ 
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Get the value of supportsStreaming
	 */ 
	public function getSupportsStreaming() {
		return $this->supportsStreaming;
	}

	/**
	 * Set the value of supportsStreaming
	 * @return  void
	 */ 
	public function setSupportsStreaming($supportsStreaming) {
		$this->supportsStreaming = $supportsStreaming;
	}
}