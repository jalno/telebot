<?php
namespace packages\telebot;

class InputTextMessageContent extends InputMessageContent {
	/**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     */
	protected $text;
	
    /**
     * Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
	protected $parseMode;
	
    /**
     * Disables link previews for links in the sent message
     *
     * @var bool
     */
	protected $disableWebPagePreview = false;

	public function __construct(string $text){
		$this->text = $text;
	}
	public static function fromJson($data) {
		$object = new static($data->message_text);
		if (isset($data->parse_mode)) {
			$object->parseMode = $data->parse_mode;
		}
		if (isset($data->disable_web_page_preview)) {
			$object->disableWebPagePreview = $data->disable_web_page_preview;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'message_text' => $this->text,
		);
		if ($this->parseMode) {
			$data['parse_mode'] = $this->parseMode;
		}
		if ($this->disableWebPagePreview) {
			$data['disable_web_page_preview'] = $this->disableWebPagePreview;
		}
		return $data;
	}


	/**
	 * Get text of the message to be sent, 1-4096 characters
	 *
	 * @return  string
	 */ 
	public function getText(): string {
		return $this->text;
	}

	/**
	 * Set text of the message to be sent, 1-4096 characters
	 *
	 * @param  string  $text  Text of the message to be sent, 1-4096 characters
	 * @return  void
	 */ 
	public function setText(string $text) {
		$this->text = $text;
	}

	/**
	 * Get if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
	 *
	 * @return  string|null
	 */ 
	public function getParseMode() {
		return $this->parseMode;
	}

	/**
	 * Set if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
	 *
	 * @param  string|null  $parseMode  if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
	 * @return  void
	 */ 
	public function setParseMode($parseMode) {
		$this->parseMode = $parseMode;
	}

	/**
	 * Get disables link previews for links in the sent message
	 *
	 * @return  bool
	 */ 
	public function getDisableWebPagePreview(): bool {
		return $this->disableWebPagePreview;
	}

	/**
	 * Set disables link previews for links in the sent message
	 *
	 * @param  bool  $disableWebPagePreview  Disables link previews for links in the sent message
	 * @return  void
	 */ 
	public function setDisableWebPagePreview(bool $disableWebPagePreview) {
		$this->disableWebPagePreview = $disableWebPagePreview;
	}
}
