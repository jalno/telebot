<?php
namespace packages\telebot;
class GetChat extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	public function __construnt($chatId) {
		$this->chatId = $chatId;
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

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return Chat::fromJson($response);
	}
}