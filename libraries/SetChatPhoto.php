<?php
namespace packages\telebot;
use \packages\base\IO\File;
class SetChatPhoto extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
     * @var File
     */
	protected $photo;

	public function __construct($chatId, File $photo) {
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
	 * @return  File
	 */ 
	public function getPhoto(): File {
		return $this->photo;
	}

	/**
	 * Set the value of photo
	 *
	 * @param  File  $photo
	 * @return  void
	 */ 
	public function setPhoto(File $photo) {
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