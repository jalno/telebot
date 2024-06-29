<?php
namespace packages\telebot;
class EditMessageText extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var int
     */
	protected $messageId;

	/**
	 * @var string
     */
	protected $text;

	/**
	 * @var string|null
     */
	protected $parseMode;

	/**
	 * @var bool
     */
	protected $disablePreview = false;

	/**
	 * @var int|null
     */
	protected $replyToMessageId;

	/**
	 * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	/**
	 * @var int|null
     */
	protected $inlineMessageId;

	/**
	 * @var bool
     */
	protected $disableNotification = false;

	public function __construct($chatId, int $messageId, string $text) {
		$this->chatId = $chatId;
		$this->messageId = $messageId;
		$this->text = $text;
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
     * @param string $text
     * @return void
     */
	public function setText(string $text) {
		$this->text = $text;
	}
	/**
     * @return string
     */
	public function getText():string {
		return $this->text;
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
	 * @param bool $disablePreview
     * @return void
     */
	public function setDisablePreview(bool $disablePreview) {
		$this->disablePreview = $disablePreview;
	}
	/**
     * @return bool
     */
	public function getDisablePreview():bool {
		return $this->disablePreview;
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
	 * Get the value of inlineMessageId
	 *
	 * @return  int|null
	 */ 
	public function getInlineMessageId() {
		return $this->inlineMessageId;
	}

	/**
	 * Set the value of inlineMessageId
	 *
	 * @param  int|null  $inlineMessageId
	 * @return  void
	 */ 
	public function setInlineMessageId($inlineMessageId) {
		$this->inlineMessageId = $inlineMessageId;
	}
	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'message_id' => $this->messageId,
            'text' => $this->text,
            'parse_mode' => $this->parseMode,
            'disable_web_page_preview' => $this->disablePreview,
            'inline_message_id' => $this->inlineMessageId,
            'reply_to_message_id' => $this->replyToMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
            'disable_notification' => $this->disableNotification,
		);
	}
	public function handleResponse($response) {
		return Message::fromJson($response);
	}

}