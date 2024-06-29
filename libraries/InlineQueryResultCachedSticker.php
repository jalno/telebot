<?php
namespace packages\telebot;
class InlineQueryResultCachedSticker extends InlineQueryResult {
	/**
     * A valid file identifier of the sticker
     *
     * @var string
     */
	protected $fileId;
	
	
	public function __construct(string $id, string $fileId){
		parent::__construct('sticker', $id, '');
		$this->fileId = $fileId;
	}
	
	public static function fromJson($data) {
		$object = new self($data->id, $data->sticker_file_id);
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
		$data['sticker_file_id'] = $this->fileId;
		return $data;
	}

	/**
	 * Get a valid file identifier of the sticker
	 *
	 * @return  string
	 */ 
	public function getFileId(): string {
		return $this->fileId;
	}

	/**
	 * Set a valid file identifier of the sticker
	 *
	 * @param  string  $fileId  A valid file identifier of the sticker
	 * @return  void
	 */ 
	public function setFileId(string $fileId) {
		$this->fileId = $fileId;
	}
}
