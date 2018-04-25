<?php
namespace packages\telebot;
use \packages\base\IO\file;
class SetChatPhoto extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
     * @var file
     */
	protected $photo;

	public function __construnt($chatId, file $photo) {
		$this->chatId = $chatId;
		$this->photo = $photo;
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
	 * Get the value of photo
	 *
	 * @return  file
	 */ 
	public function getPhoto(): file {
		return $this->photo;
	}

	/**
	 * Set the value of photo
	 *
	 * @param  file  $photo
	 * @return  void
	 */ 
	public function setPhoto(file $photo) {
		$this->photo = $photo;
	}

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'photo' => $this->photo,
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return $response;
	}
}