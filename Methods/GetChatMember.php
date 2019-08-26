<?php
namespace packages\telebot;
class GetChatMember extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
     * @var int
     */
	protected $userId;

	public function __construct($chatId, int $userId) {
		$this->chatId = $chatId;
		$this->userId = $userId;
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
	 * Get the value of userId
	 *
	 * @return  int
	 */ 
	public function getUserId(): int {
		return $this->userId;
	}

	/**
	 * Set the value of userId
	 *
	 * @param  int  $userId
	 * @return  void
	 */ 
	public function setUserId(int $userId) {
		$this->userId = $userId;
	}

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'user_id' => $this->userId,
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return ChatMember::fromJson($response);
	}
}