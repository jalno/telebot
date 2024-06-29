<?php
namespace packages\telebot;
class InlineQueryResultVoice extends InlineQueryResult {
	/**
     * A valid URL for the voice recording
     *
     * @var string
     */
	protected $url;

    /**
     * Audio duration in seconds
     *
     * @var int|null
     */
	protected $duration;

    /**
	 * Caption of the Audio to be sent, 0-200 characters
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
	
	
	public function __construct(string $id, string $url){
		parent::__construct('voice', $id, '');
		$this->url = $url;
	}
	
	public static function fromJson($data) {
		$object = new self($data->id, $data->voice_url);
		if (isset($data->voice_duration)) {
			$object->duration = $data->voice_duration;
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
	public function toJson() {
		$data = parent::toJson();
		if ($this->url) {
			$data['voice_url'] = $this->url;
		}
		if ($this->duration) {
			$data['voice_duration'] = $this->duration;
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
	 * Get a valid URL for the voice file
	 *
	 * @return  string
	 */ 
	public function getUrl(): string {
		return $this->url;
	}

	/**
	 * Set a valid URL for the voice file
	 *
	 * @param  string  $url  A valid URL for the voice file
	 * @return  void
	 */ 
	public function setUrl(string $url) {
		$this->url = $url;
	}

	/**
	 * Get voice duration in seconds
	 *
	 * @return  int|null
	 */ 
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Set voice duration in seconds
	 *
	 * @param  int|null  $duration  Audio duration in seconds
	 * @return  void
	 */ 
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Get caption of the Audio to be sent, 0-200 characters
	 *
	 * @return  string|null
	 */ 
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Set caption of the Audio to be sent, 0-200 characters
	 *
	 * @param  string|null  $caption  Caption of the Audio to be sent, 0-200 characters
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
