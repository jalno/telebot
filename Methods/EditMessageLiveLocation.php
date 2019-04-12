<?php
namespace packages\telebot;
class EditMessageLiveLocation extends Method {
	/**
     * @var int
     */
	protected $chatId;

	/**
     * @var int
     */
	protected $messageId;

	/**
     * @var int
     */
	protected $inlineMessageId;

	/**
	 * @var float
     */
	protected $latitude;
	
	/**
	 * @var float
     */
	protected $longitude;

	/**
	 * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	public function __construnt(int $chatId, int $messageId, int $inlineMessageId, float $latitude, float $longitude) {
		$this->chatId = $chatId;
		$this->messageId = $messageId;
		$this->inlineMessageId = $inlineMessageId;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}
	/**
     * @param int $chatId
     * @return void
     */
	public function setChatID(int $chatId) {
		$this->chatId = $chatId;
	}
	/**
     * @return int
     */
	public function getChatID():int {
		return $this->chatId;
	}
	/**
	 * Get the value of latitude
	 *
	 * @return  float
	 */ 
	public function getLatitude(): float {
		return $this->latitude;
	}

	/**
	 * Set the value of latitude
	 *
	 * @param  float  $latitude
	 * @return  void
	 */ 
	public function setLatitude(float $latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * Get the value of longitude
	 *
	 * @return  float
	 */ 
	public function getLongitude(): float {
		return $this->longitude;
	}

	/**
	 * Set the value of longitude
	 *
	 * @param  float  $longitude
	 * @return  void
	 */ 
	public function setLongitude(float $longitude) {
		$this->longitude = $longitude;
	}


	/**
	 * Get the value of messageId
	 *
	 * @return  int
	 */ 
	public function getMessageId(): int {
		return $this->messageId;
	}

	/**
	 * Set the value of messageId
	 *
	 * @param  int  $messageId
	 * @return  void
	 */ 
	public function setMessageId(int $messageId) {
		$this->messageId = $messageId;
	}

	/**
	 * Get the value of inlineMessageId
	 *
	 * @return  int
	 */ 
	public function getInlineMessageId(): int {
		return $this->inlineMessageId;
	}

	/**
	 * Set the value of inlineMessageId
	 *
	 * @param  int  $inlineMessageId
	 * @return  void
	 */ 
	public function setInlineMessageId(int $inlineMessageId) {
		$this->inlineMessageId = $inlineMessageId;
	}

	/**
	 * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null $replyMarkup
     * @return void
     */
	public function setReplyMarkup($replyMarkup) {
		$this->replyMarkup = $replyMarkup;
	}
	/**
     * @return InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	public function getReplyMarkup() {
		return $this->replyMarkup;
	}

	
	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'message_id' => $this->messageId,
			'inline_message_id' => $this->inlineMessageId,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}
}