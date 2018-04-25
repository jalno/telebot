<?php
namespace packages\telebot;
class KickChatMember extends Method {
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
	 * @param int|string $chatId Unique identifier for the target group or username of the target supergroup (in the format @supergroupusername)
	 * @param int $userId Unique identifier of the target user
	 * @param null|int $untilDate Date when the user will be unbanned, unix time.
     *                 If user is banned for more than 366 days or less than 30 seconds from the current time
     *                 they are considered to be banned forever
	 */
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

	public function toJson(): array {
		return array(
			'chat_id' => $this->chatId,
			'user_id' => $this->userId,
            'until_date' => $this->untilDate
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return $response;
	}
}