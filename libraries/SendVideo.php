<?php
namespace packages\telebot;
use \packages\base\IO\File;
class SendVideo extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var File
     */
	protected $video;

	/**
	 * @var int|null
     */
	protected $duration;

	/**
	 * @var bool
     */
	protected $supportsStreaming = false;

	/**
	 * @var string|null
     */
	protected $caption;

	/**
	 * @var string|null
     */
	protected $parseMode;
	
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

	public function __construct($chatId, File $video) {
		$this->chatId = $chatId;
		$this->video = $video;
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
	 * Get the value of video
	 *
	 * @return  File
	 */ 
	public function getVideo(): File {
		return $this->video;
	}

	/**
	 * Set the value of video
	 *
	 * @param  File  $video
	 * @return  void
	 */ 
	public function setVideo(File $video) {
		$this->video = $video;
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
	 * Get the value of supportsStreaming
	 *
	 * @return  bool
	 */ 
	public function getSupportsStreaming(): bool {
		return $this->supportsStreaming;
	}

	/**
	 * Set the value of supportsStreaming
	 *
	 * @param  bool  $supportsStreaming
	 * @return  void
	 */ 
	public function setSupportsStreaming(bool $supportsStreaming) {
		$this->supportsStreaming = $supportsStreaming;
	}

	/**
	 * Get the value of caption
	 *
	 * @return  string|null
	 */ 
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Set the value of caption
	 *
	 * @param  string|null  $caption
	 * @return  void
	 */ 
	public function setCaption($caption) {
		$this->caption = $caption;
	}

	/**
	 * Get the value of parseMode
	 *
	 * @return  string|null
	 */ 
	public function getParseMode() {
		return $this->parseMode;
	}

	/**
	 * Set the value of parseMode
	 *
	 * @param  string|null  $parseMode
	 * @return  void
	 */ 
	public function setParseMode($parseMode) {
		$this->parseMode = $parseMode;
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
            'video' => $this->video,
            'duration' => $this->duration,
            'caption' => $this->caption,
            'supports_streaming' => $this->supportsStreaming,
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