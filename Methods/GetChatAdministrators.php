<?php
namespace packages\telebot;
class GetChatAdministrators extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	public function __construct($chatId) {
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
	 * @return int
	 */
	public function handleResponse($response) {
		$members = [];
		foreach($response as $item) {
			$members[] = ChatMember::fromJson($item);
		}
		return $members;
	}
}