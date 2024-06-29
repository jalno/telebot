<?php
namespace packages\telebot;
use \packages\base\IO\File;
class SendAudio extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var File
     */
	protected $audio;

	/**
	 * @var int|null
     */
	protected $duration;

	/**
	 * @var string|null
     */
	protected $performer;

	/**
	 * @var string|null
     */
	protected $title;
	
	/**
	 * @var int|null
     */
	protected $replyToMessageId;

	/**
	 * @var ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	/**
	 * @var bool
     */
	protected $disableNotification = false;

	/**
	 * @var string|null
     */
	protected $parseMode;

	public function __construct($chatId, File $audio) {
		$this->chatId = $chatId;
		$this->audio = $audio;
	}
	/**
     * @param string|null $parseMode
     * @return void
     */
	public function setParseMode($parseMode) {
		$this->parseMode = $parseMode;
	}
	/**
     * @return string|null
     */
	public function getParseMode() {
		return $this->parseMode;
	}
	/**
     * @param int|string $chatId
     * @return void
     */
	public function setChatID($chatId) {
		$this->chatId = $chatId;
	}
	/**
     * @return int
     */
	public function getChatID() {
		return $this->chatId;
	}
	
	/**
	 * Get the value of audio
	 *
	 * @return  File
	 */ 
	public function getAudio(): File {
		return $this->audio;
	}

	/**
	 * Set the value of audio
	 *
	 * @param  File  $audio
	 * @return  void
	 */ 
	public function setAudio(File $audio) {
		$this->audio = $audio;
	}

	/**
	 * Get the value of duration
	 *
	 * @return  int|null
	 */ 
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Set the value of duration
	 *
	 * @param  int|null  $duration
	 * @return  void
	 */ 
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Get the value of performer
	 *
	 * @return  string|null
	 */ 
	public function getPerformer() {
		return $this->performer;
	}

	/**
	 * Set the value of performer
	 *
	 * @param  string|null  $performer
	 * @return  void
	 */ 
	public function setPerformer($performer) {
		$this->performer = $performer;
	}

	/**
	 * Get the value of title
	 *
	 * @return  string|null
	 */ 
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param  string|null  $title
	 * @return  void
	 */ 
	public function setTitle($title) {
		$this->title = $title;
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
	 * @param ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null $replyMarkup
     * @return void
     */
	public function setReplyMarkup($replyMarkup) {
		$this->replyMarkup = $replyMarkup;
	}
	/**
     * @return ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
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
            'audio' => $this->audio,
            'duration' => $this->duration,
            'performer' => $this->performer,
            'title' => $this->title,
            'parse_mode' => $this->parseMode,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}
}