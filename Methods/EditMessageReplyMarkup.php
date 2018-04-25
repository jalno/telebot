<?php
namespace packages\telebot;
class EditMessageReplyMarkup extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var int
     */
	protected $messageId;

	/**
	 * @var InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	/**
	 * @var int|null
     */
	protected $inlineMessageId;

	public function __construnt($chatId, int $messageId, $replyMarkup) {
		$this->chatId = $chatId;
		$this->messageId = $messageId;
		$this->replyMarkup = $replyMarkup;
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
            'inline_message_id' => $this->inlineMessageId,
            'reply_markup' => is_null($this->replyMarkup) ? $this->replyMarkup : $this->replyMarkup->toJson(),
		);
	}
	public function handleResponse(\stdObject $response) {
		return Message::fromJson($response);
	}

}