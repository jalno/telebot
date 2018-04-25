<?php
namespace packages\telebot;
class InlineQueryResultCachedVoice extends InlineQueryResult {
	/**
     * A valid file identifier for the voice message
     *
     * @var string
     */
	protected $fileId;

    /**
	 * Title for the result
	 * 
     * @var string
     */
	protected $title;

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
	
	
	public function __construct(string $id, string $title, string $fileId){
		parent::__construct('voice', $id, $title);
		$this->fileId = $fileId;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->title, $data->voice_file_id);
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
		$data['voice_file_id'] = $this->fileId;
		$data['title'] = $this->title;
		if ($this->caption) {
			$data['caption'] = $this->caption;
		}
		if ($this->parseMode) {
			$data['parse_mode'] = $this->parseMode;
		}
		return $data;
	}

	/**
	 * Get a valid file identifier for the file
	 *
	 * @return  string
	 */ 
	public function getFileId(): string {
		return $this->fileId;
	}

	/**
	 * Set a valid file identifier for the file
	 *
	 * @param  string  $fileId  A valid file identifier for the file
	 * @return  void
	 */ 
	public function setFileId(string $fileId) {
		$this->fileId = $fileId;
	}

	/**
	 * Get title for the result
	 *
	 * @return  string
	 */ 
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * Set title for the result
	 *
	 * @param  string  $title  Title for the result
	 * @return  void
	 */ 
	public function setTitle(string $title) {
		$this->title = $title;
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
