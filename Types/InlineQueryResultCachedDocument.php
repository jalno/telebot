<?php
namespace packages\telebot;
class InlineQueryResultCachedDocument extends InlineQueryResult {
	/**
     * A valid file identifier for the file
     *
     * @var string
     */
	protected $fileId;
	
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
	
	
	public function __construct(string $id, string $title, string $fileId){
		parent::__construct('document', $id, $title);
		$this->fileId = $fileId;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->title, $data->document_file_id);
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
		$data['document_file_id'] = $this->fileId;
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
