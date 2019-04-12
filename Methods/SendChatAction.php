<?php
namespace packages\telebot;
class SendChatAction extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 *  Type of action to broadcast. Choose one, depending on what the user is about to receive:
     * `typing` for text messages, `upload_photo` for photos, `record_video` or `upload_video` for videos,
     * `record_audio` or upload_audio for audio files, `upload_document` for general files,
     * `find_location` for location data.
     *
	 * @var string
     */
	protected $action;
	
	public function __construnt($chatId, string $action) {
		$this->chatId = $chatId;
		$this->action = $action;
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
     * @param string $action
     * @return void
     */
	public function setAction(string $action) {
		$this->action = $action;
	}
	/**
     * @return string
     */
	public function getAction():string {
		return $this->action;
	}
	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
            'action' => $this->action
		);
	}
	public function handleResponse($response) {
		return $response;
	}
}