<?php
namespace packages\telebot;
class DeleteMessage extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var int
     */
	protected $messageId;

	public function __construct($chatId, int $messageId) {
		$this->chatId = $chatId;
		$this->messageId = $messageId;
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

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'message_id' => $this->messageId,
		);
	}
	public function handleResponse($response) {
		return $response;
	}

}