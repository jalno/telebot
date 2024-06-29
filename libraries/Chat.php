<?php
namespace packages\telebot;
class Chat extends Type {
	/**
	 * @var int|string
	 */
	protected $id;
	
	/**
	 * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
	 * 
	 * @var string
	 */
	protected $type;

	/**
	 * @var string|null
	 */
	protected $title;

	/**
	 * @var string|null
	 */
	protected $username;

	/**
	 * First name of the other party in a private chat
	 * 
	 * @var string|null
	 */
	protected $firstName;

	/**
	 * Last name of the other party in a private chat
	 * 
	 * @var string|null
	 */
	protected $lastName;

	/**
	 * @var bool|null
	 */
	protected $allMembersAreAdministrators;

	/**
	 * Chat photo. Returned only in getChat.
	 * 
	 * @var ChatPhoto|null
	 */
	protected $photo;

	/**
	 * Description, for supergroups and channel chats. Returned only in getChat.
	 * 
	 * @var string|null
	 */
	protected $description;

	/**
	 * Description, for supergroups and channel chats. Returned only in getChat.
	 * 
	 * @var string|null
	 */
	protected $inviteLink;

	/**
	 * Pinned message, for supergroups. Returned only in getChat.
	 * 
	 * @var Message|null
	 */
	protected $pinnedMessage;

	/**
	 * For supergroups, name of group sticker set. Returned only in getChat.
	 * 
	 * @var string
	 */
	protected $stickerSetName;

	/**
	 * True, if the bot can change the group sticker set. Returned only in getChat.
	 * 
	 * @var bool|null
	 */
	protected $canSetStickerSet;

	public function __construct($id, string $type){
		$this->id = $id;
		$this->type = $type;
	}
	public static function fromJson($data) {
		$object = new self($data->id, $data->type);
		if (isset($data->title)) {
			$object->title = $data->title;
		}
		if (isset($data->username)) {
			$object->username = $data->username;
		}
		if (isset($data->first_name)) {
			$object->firstName = $data->first_name;
		}
		if (isset($data->last_name)) {
			$object->lastName = $data->last_name;
		}
		if (isset($data->all_members_are_administrators)) {
			$object->allMembersAreAdministrators = $data->all_members_are_administrators;
		}
		if (isset($data->photo)) {
			$object->photo = ChatPhoto::fromJson($data->photo);
		}
		if (isset($data->description)) {
			$object->description = $data->description;
		}
		if (isset($data->invite_link)) {
			$object->inviteLink = $data->invite_link;
		}
		if (isset($data->pinned_message)) {
			$object->pinnedMessage = Message::fromJson($data->pinned_message);
		}
		if (isset($data->sticker_set_name)) {
			$object->stickerSetName = $data->sticker_set_name;
		}
		if (isset($data->can_set_sticker_set)) {
			$object->canSetStickerSet = $data->can_set_sticker_set;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'id' => $this->id,
			'type' => $this->type,
		);
		return $data;
	}


	/**
	 * Get the value of id
	 *
	 * @return  int|string
	 */ 
	public function getId() {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param  int|string  $id
	 * @return  void
	 */ 
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Get type of chat, can be either “private”, “group”, “supergroup” or “channel”
	 *
	 * @return  string
	 */ 
	public function getType(): string {
		return $this->type;
	}

	/**
	 * Set type of chat, can be either “private”, “group”, “supergroup” or “channel”
	 *
	 * @param  string  $type  Type of chat, can be either “private”, “group”, “supergroup” or “channel”
	 * @return  void
	 */ 
	public function setType(string $type) {
		$this->type = $type;
	}

	/**
	 * Get the value of title
	 *
	 * @return  string|null
	 */ 
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param  string|null  $title
	 * @return  void
	 */ 
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Get the value of username
	 *
	 * @return  string|null
	 */ 
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Set the value of username
	 *
	 * @param  string|null  $username
	 * @return  void
	 */ 
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * Get first name of the other party in a private chat
	 *
	 * @return  string|null
	 */ 
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * Set first name of the other party in a private chat
	 *
	 * @param  string|null  $firstName  First name of the other party in a private chat
	 * @return  void
	 */ 
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Get last name of the other party in a private chat
	 *
	 * @return  string|null
	 */ 
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Set last name of the other party in a private chat
	 *
	 * @param  string|null  $lastName  Last name of the other party in a private chat
	 * @return  void
	 */ 
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * Get the value of allMembersAreAdministrators
	 *
	 * @return  bool|null
	 */ 
	public function getAllMembersAreAdministrators() {
		return $this->allMembersAreAdministrators;
	}

	/**
	 * Set the value of allMembersAreAdministrators
	 *
	 * @param  bool|null  $allMembersAreAdministrators
	 * @return  void
	 */ 
	public function setAllMembersAreAdministrators($allMembersAreAdministrators) {
		$this->allMembersAreAdministrators = $allMembersAreAdministrators;
	}

	/**
	 * Get chat photo. Returned only in getChat.
	 *
	 * @return  ChatPhoto|null
	 */ 
	public function getPhoto() {
		return $this->photo;
	}

	/**
	 * Set chat photo. Returned only in getChat.
	 *
	 * @param  ChatPhoto|null  $photo  Chat photo. Returned only in getChat.
	 * @return  void
	 */ 
	public function setPhoto($photo) {
		$this->photo = $photo;
	}

	/**
	 * Get description, for supergroups and channel chats. Returned only in getChat.
	 *
	 * @return  string|null
	 */ 
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set description, for supergroups and channel chats. Returned only in getChat.
	 *
	 * @param  string|null  $description  Description, for supergroups and channel chats. Returned only in getChat.
	 * @return  void
	 */ 
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Get description, for supergroups and channel chats. Returned only in getChat.
	 *
	 * @return  string|null
	 */ 
	public function getInviteLink() {
		return $this->inviteLink;
	}

	/**
	 * Set description, for supergroups and channel chats. Returned only in getChat.
	 *
	 * @param  string|null  $inviteLink  Description, for supergroups and channel chats. Returned only in getChat.
	 * @return  void
	 */ 
	public function setInviteLink($inviteLink) {
		$this->inviteLink = $inviteLink;
	}

	/**
	 * Get pinned message, for supergroups. Returned only in getChat.
	 *
	 * @return  Message|null
	 */ 
	public function getPinnedMessage() {
		return $this->pinnedMessage;
	}

	/**
	 * Set pinned message, for supergroups. Returned only in getChat.
	 *
	 * @param  Message|null  $pinnedMessage  Pinned message, for supergroups. Returned only in getChat.
	 * @return  void
	 */ 
	public function setPinnedMessage($pinnedMessage) {
		$this->pinnedMessage = $pinnedMessage;
	}

	/**
	 * Get for supergroups, name of group sticker set. Returned only in getChat.
	 *
	 * @return  string
	 */ 
	public function getStickerSetName(): string {
		return $this->stickerSetName;
	}

	/**
	 * Set for supergroups, name of group sticker set. Returned only in getChat.
	 *
	 * @param  string  $stickerSetName  For supergroups, name of group sticker set. Returned only in getChat.
	 * @return  void
	 */ 
	public function setStickerSetName(string $stickerSetName) {
		$this->stickerSetName = $stickerSetName;
	}

	/**
	 * Get true, if the bot can change the group sticker set. Returned only in getChat.
	 *
	 * @return  bool|null
	 */ 
	public function getCanSetStickerSet() {
		return $this->canSetStickerSet;
	}

	/**
	 * Set true, if the bot can change the group sticker set. Returned only in getChat.
	 *
	 * @param  bool|null  $canSetStickerSet  True, if the bot can change the group sticker set. Returned only in getChat.
	 * @return  void
	 */ 
	public function setCanSetStickerSet($canSetStickerSet) {
		$this->canSetStickerSet = $canSetStickerSet;
	}
}