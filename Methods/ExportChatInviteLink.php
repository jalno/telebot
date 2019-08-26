<?php
namespace packages\telebot;
class ExportChatInviteLink extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	public function __construct($chatId, int $userId) {
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
	 * @return string
	 */
	public function handleResponse($response) {
		return $response;
	}
}