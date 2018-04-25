<?php
namespace packages\telebot;
class RestrictChatMember extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var int
     */
	protected $userId;

	/**
	 * @var int|null
     */
	protected $untilDate;

	/**
	 * @var bool
     */
	protected $canSendMessages = false;

	/**
	 * @var bool
     */
	protected $canSendMediaMessages = false;

	/**
	 * @var bool
     */
	protected $canSendOtherMessages = false;

	/**
	 * @var bool
     */
	protected $canAddWebPagePreviews = false;

	public function __construnt($chatId, int $userId) {
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

	/**
	 * Get the value of untilDate
	 *
	 * @return  int|null
	 */ 
	public function getUntilDate() {
		return $this->untilDate;
	}

	/**
	 * Set the value of untilDate
	 *
	 * @param  int|null  $untilDate
	 * @return  void
	 */ 
	public function setUntilDate($untilDate) {
		$this->untilDate = $untilDate;
	}

	/**
	 * Get the value of canSendMessages
	 *
	 * @return  bool
	 */ 
	public function getCanSendMessages(): bool {
		return $this->canSendMessages;
	}

	/**
	 * Set the value of canSendMessages
	 *
	 * @param  bool  $canSendMessages
	 * @return  void
	 */ 
	public function setCanSendMessages(bool $canSendMessages) {
		$this->canSendMessages = $canSendMessages;
	}

	/**
	 * Get the value of canSendMediaMessages
	 *
	 * @return  bool
	 */ 
	public function getCanSendMediaMessages(): bool {
		return $this->canSendMediaMessages;
	}

	/**
	 * Set the value of canSendMediaMessages
	 *
	 * @param  bool  $canSendMediaMessages
	 * @return  void
	 */ 
	public function setCanSendMediaMessages(bool $canSendMediaMessages) {
		$this->canSendMediaMessages = $canSendMediaMessages;
	}

	/**
	 * Get the value of canSendOtherMessages
	 *
	 * @return  bool
	 */ 
	public function getCanSendOtherMessages(): bool {
		return $this->canSendOtherMessages;
	}

	/**
	 * Set the value of canSendOtherMessages
	 *
	 * @param  bool  $canSendOtherMessages
	 * @return  void
	 */ 
	public function setCanSendOtherMessages(bool $canSendOtherMessages) {
		$this->canSendOtherMessages = $canSendOtherMessages;
	}

	/**
	 * Get the value of canAddWebPagePreviews
	 *
	 * @return  bool
	 */ 
	public function getCanAddWebPagePreviews(): bool {
		return $this->canAddWebPagePreviews;
	}

	/**
	 * Set the value of canAddWebPagePreviews
	 *
	 * @param  bool  $canAddWebPagePreviews
	 * @return  void
	 */ 
	public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews) {
		$this->canAddWebPagePreviews = $canAddWebPagePreviews;
	}

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'user_id' => $this->userId,
			'until_date' => $this->untilDate,
			'can_send_messages' => $this->canSendMessages,
			'can_send_media_messages' => $this->canSendMediaMessages,
			'can_send_other_messages' => $this->canSendOtherMessages,
			'can_add_web_page_previews' => $this->canAddWebPagePreviews,
		);
	}
	public function handleResponse($response) {
		return $response;
	}
}