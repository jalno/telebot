<?php
namespace packages\telebot;
class SetChatTitle extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
     * @var string
     */
	protected $title;

	public function __construct($chatId, string $title) {
		$this->chatId = $chatId;
		$this->title = $title;
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
	 * Get the value of title
	 *
	 * @return  string
	 */ 
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param  string  $title
	 * @return  void
	 */ 
	public function setTitle(string $title) {
		$this->title = $title;
	}

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'title' => $this->title,
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return $response;
	}
}