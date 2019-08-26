<?php
namespace packages\telebot;
class SendLocation extends Method {
	/**
     * @var int
     */
	protected $chatId;

	/**
	 * @var float
     */
	protected $latitude;
	
	/**
	 * @var float
     */
	protected $longitude;

	/**
	 * @var int
     */
	protected $livePeriod;

	/**
	 * @var int|null
     */
	protected $replyToMessageId;

	/**
	 * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	/**
	 * @var bool
     */
	protected $disableNotification = false;

	public function __construct(int $chatId, float $latitude, float $longitude) {
		$this->chatId = $chatId;
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
	 * Get the value of livePeriod
	 *
	 * @return  int
	 */ 
	public function getLivePeriod(): int {
		return $this->livePeriod;
	}

	/**
	 * Set the value of livePeriod
	 *
	 * @param  int  $livePeriod
	 * @return  void
	 */ 
	public function setLivePeriod(int $livePeriod) {
		$this->livePeriod = $livePeriod;
	}

	/**
	 * @param int|null $replyToMessageId
     * @return void
     */
	public function setReplyToMessageId($replyToMessageId) {
		$this->replyToMessageId = $replyToMessageId;
	}
	/**
     * @return int|null
     */
	public function getReplyToMessageId() {
		return $this->replyToMessageId;
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

	/**
	 * @param bool $disableNotification
     * @return void
     */
	public function setDisableNotification(bool $disableNotification) {
		$this->disableNotification = $disableNotification;
	}
	/**
     * @return bool
     */
	public function getDisableNotification():bool {
		return $this->disableNotification;
	}
	
	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'live_period' => $this->live_period,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}
}