<?php
namespace packages\telebot;

use packages\base\IO\file;

abstract class InputMedia extends Type {
	/**
	 * Type of the result, must be photo or video
	 * @var string
	 */
	protected $type;

	/**
	 * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass instaceof File
	 * @var string|file
	 */
	protected $media;

	/**
	 * Caption of the video to be sent, 0-200 characters
	 * @var string|null
	 */
	protected $caption;

	/**
	 * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
	 * @var string|null
	 */
	protected $parseMode;
	public function __construct(string $type, $media) {
		$this->type = $type;
		$this->media = $media;
	}
	public function toJson() {
		$json = array(
			'type' => $this->type,
			'media' => $media
		);
		if ($this->caption) {
			$json['caption'] = $this->caption;
		}
		return $json;
	}
	/**
	 * Get type of the result, must be photo or video
	 *
	 * @return  string
	 */ 
	public function getType(): string {
		return $this->type;
	}

	/**
	 * Set type of the result, must be photo or video
	 *
	 * @param  string  $type  Type of the result, must be photo or video
	 * @return  void
	 */ 
	public function setType(string $type) {
		$this->type = $type;
	}

	/**
	 * Get file to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass instaceof File
	 *
	 * @return  string|file
	 */ 
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Set file to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass instaceof File
	 *
	 * @param  string|file  $media  File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass instaceof File
	 * @return  void
	 */ 
	public function setMedia($media) {
		$this->media = $media;
	}

	/**
	 * Get caption of the video to be sent, 0-200 characters
	 *
	 * @return  string|null
	 */ 
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Set caption of the video to be sent, 0-200 characters
	 *
	 * @param  string|null  $caption  Caption of the video to be sent, 0-200 characters
	 * @return  void
	 */ 
	public function setCaption($caption) {
		$this->caption = $caption;
	}

	/**
	 * Get send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
	 *
	 * @return  string|null
	 */ 
	public function getParseMode() {
		return $this->parseMode;
	}

	/**
	 * Set send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
	 *
	 * @param  string|null  $parseMode  Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
	 * @return  void
	 */ 
	public function setParseMode($parseMode) {
		$this->parseMode = $parseMode;
	}
}