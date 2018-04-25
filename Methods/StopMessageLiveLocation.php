<?php
namespace packages\telebot;
class StopMessageLiveLocation extends Method {
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
	 * @var ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply|ReplyKeyboardRemove|null
     */
	protected $replyMarkup;

	public function __construnt(int $chatId, int $messageId, int $inlineMessageId) {
		$this->chatId = $chatId;
		$this->messageId = $messageId;
		$this->inlineMessageId = $inlineMessageId;
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