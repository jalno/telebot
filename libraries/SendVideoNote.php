<?php
namespace packages\telebot;
use \packages\base\IO\File;
class SendVideoNote extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var File
     */
	protected $videoNote;

	/**
	 * @var int|null
     */
	protected $duration;

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

	public function __construct($chatId, File $videoNote) {
		$this->chatId = $chatId;
		$this->videoNote = $videoNote;
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
	 * Get the value of videoNote
	 *
	 * @return  File
	 */ 
	public function getVideoNote(): File {
		return $this->videoNote;
	}

	/**
	 * Set the value of videoNote
	 *
	 * @param  File  $videoNote
	 * @return  void
	 */ 
	public function setVideoNote(File $videoNote) {
		$this->videoNote = $videoNote;
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
            'video_note' => $this->videoNote,
            'duration' => $this->duration,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}
}