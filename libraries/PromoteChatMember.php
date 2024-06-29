<?php
namespace packages\telebot;
class PromoteChatMember extends Method {
	/**
     * @var int|string
     */
	protected $chatId;

	/**
	 * @var int
     */
	protected $userId;

	/**
	 * @var bool
     */
	protected $canChangeInfo = true;

	/**
	 * @var bool
     */
	protected $canPostMessages = true;

	/**
	 * @var bool
     */
	protected $canEditMessages = true;

	/**
	 * @var bool
     */
	protected $canDeleteMessages = true;

	/**
	 * @var bool
     */
	protected $canInviteUsers = true;

	/**
	 * @var bool
     */
	protected $canRestrictMembers = true;

	/**
	 * @var bool
     */
	protected $canPinMessages = true;

	/**
	 * @var bool
     */
	protected $canPromoteMembers = true;

	/**
	 * @var int
     */
	protected $messageId;

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

	/**
	 * Get the value of canChangeInfo
	 *
	 * @return  bool
	 */ 
	public function getCanChangeInfo(): bool {
		return $this->canChangeInfo;
	}

	/**
	 * Set the value of canChangeInfo
	 *
	 * @param  bool  $canChangeInfo
	 * @return  void
	 */ 
	public function setCanChangeInfo(bool $canChangeInfo) {
		$this->canChangeInfo = $canChangeInfo;
	}

	/**
	 * Get the value of canPostMessages
	 *
	 * @return  bool
	 */ 
	public function getCanPostMessages(): bool {
		return $this->canPostMessages;
	}

	/**
	 * Set the value of canPostMessages
	 *
	 * @param  bool  $canPostMessages
	 * @return  void
	 */ 
	public function setCanPostMessages(bool $canPostMessages) {
		$this->canPostMessages = $canPostMessages;
	}

	/**
	 * Get the value of canEditMessages
	 *
	 * @return  bool
	 */ 
	public function getCanEditMessages(): bool {
		return $this->canEditMessages;
	}

	/**
	 * Set the value of canEditMessages
	 *
	 * @param  bool  $canEditMessages
	 * @return  void
	 */ 
	public function setCanEditMessages(bool $canEditMessages) {
		$this->canEditMessages = $canEditMessages;
	}

	/**
	 * Get the value of canDeleteMessages
	 *
	 * @return  bool
	 */ 
	public function getCanDeleteMessages(): bool {
		return $this->canDeleteMessages;
	}

	/**
	 * Set the value of canDeleteMessages
	 *
	 * @param  bool  $canDeleteMessages
	 * @return  void
	 */ 
	public function setCanDeleteMessages(bool $canDeleteMessages) {
		$this->canDeleteMessages = $canDeleteMessages;
	}

	/**
	 * Get the value of canInviteUsers
	 *
	 * @return  bool
	 */ 
	public function getCanInviteUsers(): bool {
		return $this->canInviteUsers;
	}

	/**
	 * Set the value of canInviteUsers
	 *
	 * @param  bool  $canInviteUsers
	 * @return  void
	 */ 
	public function setCanInviteUsers(bool $canInviteUsers) {
		$this->canInviteUsers = $canInviteUsers;
	}

	/**
	 * Get the value of canRestrictMembers
	 *
	 * @return  bool
	 */ 
	public function getCanRestrictMembers(): bool {
		return $this->canRestrictMembers;
	}

	/**
	 * Set the value of canRestrictMembers
	 *
	 * @param  bool  $canRestrictMembers
	 * @return  void
	 */ 
	public function setCanRestrictMembers(bool $canRestrictMembers) {
		$this->canRestrictMembers = $canRestrictMembers;
	}

	/**
	 * Get the value of canPinMessages
	 *
	 * @return  bool
	 */ 
	public function getCanPinMessages(): bool {
		return $this->canPinMessages;
	}

	/**
	 * Set the value of canPinMessages
	 *
	 * @param  bool  $canPinMessages
	 * @return  void
	 */ 
	public function setCanPinMessages(bool $canPinMessages) {
		$this->canPinMessages = $canPinMessages;
	}
	/**
     * @param int $messageId
     * @return void
     */
	public function setMessageId($messageId) {
		$this->chatId = $messageId;
	}

	/**
	 *
	 * @return  int
	 */ 
	public function getMessageId(): int {
		return $this->messageId;
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