<?php
namespace packages\telebot;
class SendContact extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var string
     */
	protected $phoneNumber;
	
	/**
	 * @var string
     */
	protected $firstName;
	
	/**
	 * @var string|null
     */
	protected $lastName;

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

	public function __construnt($chatId, string $phoneNumber, string $firstName) {
		$this->chatId = $chatId;
		$this->phoneNumber = $phoneNumber;
		$this->firstName = $firstName;
	}
	/**
     * @param int|string $chatId
     * @return void
     */
	public function setChatID($chatId) {
		$this->chatId = $chatId;
	}
	/**
     * @return int|string
     */
	public function getChatID() {
		return $this->chatId;
	}
	/**
     * @param string $phoneNumber
     * @return void
     */
	public function setPhoneNumber(string $phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}
	/**
     * @return string
     */
	public function getPhoneNumber():string {
		return $this->phoneNumber;
	}
	/**
     * @param string $firstName
     * @return void
     */
	public function setFirstName(string $firstName) {
		$this->firstName = $firstName;
	}
	/**
     * @return string
     */
	public function getFirstName():string {
		return $this->firstName;
	}
	/**
     * @param string|null $lastname
     * @return void
     */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	/**
     * @return string|null
     */
	public function getLastname() {
		return $this->lastname;
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
            'phone_number' => $this->phoneNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}
}