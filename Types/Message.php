<?php
namespace packages\telebot;
class Message extends Type {
	/**
	 * Unique message identifier
	 * @var int
	 */
	protected $id;

	/**
	 * Date the message was sent in Unix time
	 * 
	 * @var int
	 */
	protected $date;

	/**
	 * Sender name. Can be empty for messages sent to channels
	 * 
	 * @var User|null
	 */
	protected $from;

	/**
	 * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
	 * 
	 * @var Chat
	 */
	protected $chat;

	/**
	 * For forwarded messages, sender of the original message
	 * 
	 * @var User|null
	 */
	protected $forwardFrom;

	/**
	 * For forwarded messages, date the original message was sent in Unix time
	 * 
	 * @var int|null
	 */
	protected $forwardDate;

	/**
	 * For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
	 * 
	 * @var Message|null
	 */
	protected $replyToMessage;

	/**
	 * For text messages, the actual UTF-8 text of the message
	 * 
	 * @var string|null
	 */
	protected $text;

	/**
	 * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
	 * 
	 * @var MessageEntity[]
	 */
	protected $entities = [];

	/**
	 * @var MessageEntity[]
	 */
	protected $captionEntities = [];

	/**
	 * Message is an audio file, information about the file
	 * 
	 * @var Audio
	 */
	protected $audio;

	/**
	 * Message is a general file, information about the file
	 * 
	 * @var Document
	 */
	protected $document;

	/**
	 * Message is a photo, available sizes of the photo
	 * 
	 * @var PhotoSize[]
	 */
	protected $photo;

	/**
	 * Message is a sticker, information about the sticker
	 * 
	 * @var Sticker
	 */
	protected $sticker;

	/**
	 * Message is a video, information about the video
	 * 
	 * @var Video
	 */
	protected $video;

	/**
	 * Message is a voice message, information about the file
	 * 
	 * @var Voice
	 */
	protected $voice;

	/**
	 * Text description of the video (usually empty)
	 * 
	 * @var string
	 */
	protected $caption;

	/**
	 * Message is a shared contact, information about the contact
	 * 
	 * @var Contact
	 */
	protected $contact;

	/**
	 * Message is a shared location, information about the location
	 * 
	 * @var Location
	 */
	protected $location;

	/**
	 * Message is a venue, information about the venue
	 * 
	 * @var Venue
	 */
	protected $venue;

	/**
	 * A new member was added to the group, information about them (this member may be bot itself)
	 * 
	 * @var User
	 */
	protected $newChatMember;

	/**
	 * A member was removed from the group, information about them (this member may be bot itself)
	 * 
	 * @var User
	 */
	protected $leftChatMember;

	/**
	 * A group title was changed to this value
	 * 
	 * @var string
	 */
	protected $newChatTitle;

	/**
	 * A group photo was change to this value
	 * 
	 * @var ChatPhoto[]
	 */
	protected $newChatPhoto;

	/**
	 * Optional. Informs that the group photo was deleted
	 * @var bool
	 */
	protected $deleteChatPhoto;

	/**
	 * Informs that the group has been created
	 * 
	 * @var bool
	 */
	protected $groupChatCreated;

	/**
	 * Service message: the supergroup has been created
	 * 
	 * @var bool
	 */
	protected $supergroupChatCreated;

	/**
	 * Service message: the channel has been created
	 * 
	 * @var bool
	 */
	protected $channelChatCreated;

	/**
	 * The group has been migrated to a supergroup with the specified identifier, not exceeding 1e13 by absolute value
	 *
	 *  @var int
	 */
	protected $migrateToChatId;

	/**
	 * The supergroup has been migrated from a group with the specified identifier, not exceeding 1e13 by absolute value
	 * 
	 * @var int
	 */
	protected $migrateFromChatId;

	/**
	 * Specified message was pinned.Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
	 * 
	 * @var Message
	 */
	protected $pinnedMessage;

	/**
	 * Message is an invoice for a payment, information about the invoice.
	 * 
	 * @var Invoice
	 */
	protected $invoice;

	/**
	 * Message is a service message about a successful payment, information about the payment.
	 * 
	 * @var SuccessfulPayment
	 */
	protected $successfulPayment;

	/**
	 * For messages forwarded from channels, signature of the post author if present
	 * 
	 * @var string
	 */
	protected $forwardSignature;

	/**
	 * Signature of the post author for messages in channels
	 * 
	 * @var string
	 */
	protected $authorSignature;

	/**
	 * The domain name of the website on which the user has logged in.
	 * 
	 * @var string
	 */
	protected $connectedWebsite;
	
	public function __construct(int $id, int $date, Chat $chat){
		$this->id = $id;
		$this->date = $date;
		$this->chat = $chat;
	}
	public static function fromJson($data) {
		$object = new static($data->message_id, $data->date, Chat::fromJson($data->chat));
		if (isset($data->from)) {
			$object->from = User::fromJson($data->from);
		}
		if (isset($data->forward_from)) {
			$object->forwardFrom = User::fromJson($data->forward_from);
		}
		if (isset($data->forward_date)) {
			$object->forwardDate = $data->forward_date;
		}
		if (isset($data->reply_to_message)) {
			$object->replyToMessage = self::fromJson($data->reply_to_message);
		}
		if (isset($data->text)) {
			$object->text = $data->text;
		}
		if (isset($data->entities)) {
			foreach($data->entities as $entity) {
				$object->entities[] = MessageEntity::fromJson($entity);
			}
		}
		if (isset($data->caption_entities)) {
			foreach($data->caption_entities as $entity) {
				$object->captionEntities[] = MessageEntity::fromJson($entity);
			}
		}
		if (isset($data->audio)) {
			$object->audio = Audio::fromJson($data->audio);
		}
		if (isset($data->document)) {
			$object->document = Document::fromJson($data->document);
		}
		if (isset($data->photo)) {
			$object->photo = array_map([PhotoSize::class, 'fromJson'], $data->photo);
		}
		if (isset($data->sticker)) {
			$object->sticker = Sticker::fromJson($data->sticker);
		}
		if (isset($data->video)) {
			$object->video = Video::fromJson($data->video);
		}
		if (isset($data->voice)) {
			$object->voice = Voice::fromJson($data->voice);
		}
		if (isset($data->caption)) {
			$object->caption = $data->caption;
		}
		if (isset($data->contact)) {
			$object->contact = Contact::fromJson($data->contact);
		}
		if (isset($data->location)) {
			$object->location = Location::fromJson($data->location);
		}
		if (isset($data->venue)) {
			$object->venue = Venue::fromJson($data->venue);
		}
		if (isset($data->venue)) {
			$object->venue = Venue::fromJson($data->venue);
		}
		if (isset($data->new_chat_member)) {
			$object->newChatMember = User::fromJson($data->new_chat_member);
		}
		if (isset($data->left_chat_member)) {
			$object->leftChatMember = User::fromJson($data->left_chat_member);
		}
		if (isset($data->new_chat_title)) {
			$object->newChatTitle = $data->new_chat_title;
		}
		if (isset($data->new_chat_photo)) {
			foreach($data->new_chat_photo as $chat_photo){
				$object->newChatPhoto[] = PhotoSize::fromJson($chat_photo);
			}
		}
		if (isset($data->delete_chat_photo)) {
			$object->deleteChatPhoto = $data->delete_chat_photo;
		}
		if (isset($data->group_chat_created)) {
			$object->groupChatCreated = $data->group_chat_created;
		}
		if (isset($data->supergroup_chat_created)) {
			$object->supergroupChatCreated = $data->supergroup_chat_created;
		}
		if (isset($data->channel_chat_created)) {
			$object->channelChatCreated = $data->channel_chat_created;
		}
		if (isset($data->migrate_to_chat_id)) {
			$object->migrateToChatId = $data->migrate_to_chat_id;
		}
		if (isset($data->migrate_from_chat_id)) {
			$object->migrateFromChatId = $data->migrate_from_chat_id;
		}
		if (isset($data->pinned_message)) {
			$object->pinnedMessage = Message::fromJson($data->pinned_message);
		}
		if (isset($data->invoice)) {
			$object->invoice = Invoice::fromJson($data->invoice);
		}
		if (isset($data->successful_payment)) {
			$object->successfulPayment = SuccessfulPayment::fromJson($data->successful_payment);
		}
		if (isset($data->forward_signature)) {
			$object->forwardSignature = $data->forward_signature;
		}
		if (isset($data->author_signature)) {
			$object->authorSignature = $data->author_signature;
		}
		if (isset($data->connected_website)) {
			$object->connectedWebsite = $data->connected_website;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'message_id' => $this->id,
			'date' => $this->date,
			'chat' => $this->chat->toJson(),
		);
		if ($this->from) {
			$data['form'] = $this->form->toJson();
		}
		if ($this->forwardFrom) {
			$data['forward_from'] = $this->forwardFrom->toJson();
		}
		if ($this->forwardDate) {
			$data['forward_date'] = $this->forwardDate;
		}
		if ($this->replyToMessage) {
			$data['reply_to_message'] = $this->replyToMessage->toJson();
		}
		if ($this->text) {
			$data['text'] = $this->text;
		}
		if ($this->entities) {
			$data['entities'] = [];
			foreach($this->entities as $entity) {
				$data['entities'][] = $entity->toJson();
			}
		}
		if ($this->captionEntities) {
			$data['caption_entities'] = [];
			foreach($this->captionEntities as $entity) {
				$data['caption_entities'][] = $entity->toJson();
			}
		}
		if ($this->audio) {
			$data['audio'] = $this->audio->toJson();
		}
		if ($this->document) {
			$data['document'] = $this->document->toJson();
		}
		if ($this->photo) {
			$data['photo'] = $this->photo->toJson();
		}
		if ($this->sticker) {
			$data['sticker'] = $this->sticker->toJson();
		}
		if ($this->video) {
			$data['video'] = $this->video->toJson();
		}
		if ($this->voice) {
			$data['voice'] = $this->voice->toJson();
		}
		if ($this->caption) {
			$data['caption'] = $this->caption;
		}
		if ($this->caption) {
			$data['caption'] = $this->caption;
		}
		if ($this->contact) {
			$data['contact'] = $this->contact->toJson();
		}
		if ($this->location) {
			$data['location'] = $this->location->toJson();
		}
		if ($this->venue) {
			$data['venue'] = $this->venue->toJson();
		}
		if ($this->newChatMember) {
			$data['new_chat_cember'] = $this->newChatMember->toJson();
		}
		if ($this->leftChatMember) {
			$data['left_chat_member'] = $this->leftChatMember->toJson();
		}
		if ($this->leftChatMember) {
			$data['left_chat_member'] = $this->leftChatMember->toJson();
		}
		if ($this->newChatTitle) {
			$data['new_chat_title'] = $this->newChatTitle->toJson();
		}
		if ($this->newChatPhoto) {
			$data['new_chat_photo'] = [];
			foreach($this->newChatPhoto as $chatphoto) {
				$data['new_chat_photo'][] = $chatphoto->toJson();
			}
		}
		if ($this->deleteChatPhoto) {
			$data['delete_chat_photo'] = $this->deleteChatPhoto;
		}
		if ($this->groupChatCreated) {
			$data['group_chat_created'] = $this->groupChatCreated;
		}
		if ($this->supergroupChatCreated) {
			$data['supergroup_chat_created'] = $this->supergroupChatCreated;
		}
		if ($this->channelChatCreated) {
			$data['channel_chat_created'] = $this->channelChatCreated;
		}
		if ($this->migrateToChatId) {
			$data['migrate_to_chat_id'] = $this->migrateToChatId;
		}
		if ($this->migrateFromChatId) {
			$data['migrate_from_chat_id'] = $this->migrateFromChatId;
		}
		if ($this->pinnedMessage) {
			$data['pinned_message'] = $this->pinnedMessage->toJson();
		}
		if ($this->invoice) {
			$data['invoice'] = $this->invoice->toJson();
		}
		if ($this->successfulPayment) {
			$data['successful_payment'] = $this->successfulPayment->toJson();
		}
		if ($this->forwardSignature) {
			$data['forward_signature'] = $this->forwardSignature;
		}
		if ($this->authorSignature) {
			$data['author_signature'] = $this->authorSignature;
		}
		if ($this->authorSignature) {
			$data['author_signature'] = $this->authorSignature;
		}
		if ($this->connectedWebsite) {
			$data['connected_website'] = $this->connectedWebsite;
		}
	}
	

	/**
	 * Get unique message identifier
	 *
	 * @return  int
	 */ 
	public function getId(): int {
		return $this->id;
	}

	/**
	 * Set unique message identifier
	 *
	 * @param  int  $id  Unique message identifier
	 * @return  void
	 */ 
	public function setId(int $id) {
		$this->id = $id;
	}

	/**
	 * Get date the message was sent in Unix time
	 *
	 * @return  int
	 */ 
	public function getDate(): int {
		return $this->date;
	}

	/**
	 * Set date the message was sent in Unix time
	 *
	 * @param  int  $date  Date the message was sent in Unix time
	 * @return  void
	 */ 
	public function setDate(int $date) {
		$this->date = $date;
	}

	/**
	 * Get sender name. Can be empty for messages sent to channels
	 *
	 * @return  User|null
	 */ 
	public function getFrom() {
		return $this->from;
	}

	/**
	 * Set sender name. Can be empty for messages sent to channels
	 *
	 * @param  User|null  $from  Sender name. Can be empty for messages sent to channels
	 * @return  void
	 */ 
	public function setFrom($from) {
		$this->from = $from;
	}

	/**
	 * Get conversation the message belongs to — user in case of a private message, GroupChat in case of a group
	 *
	 * @return  Chat
	 */ 
	public function getChat(): Chat {
		return $this->chat;
	}

	/**
	 * Set conversation the message belongs to — user in case of a private message, GroupChat in case of a group
	 *
	 * @param  Chat  $chat  Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
	 * @return  void
	 */ 
	public function setChat(Chat $chat) {
		$this->chat = $chat;
	}

	/**
	 * Get for forwarded messages, sender of the original message
	 *
	 * @return  User|null
	 */ 
	public function getForwardFrom() {
		return $this->forwardFrom;
	}

	/**
	 * Set for forwarded messages, sender of the original message
	 *
	 * @param  User|null  $forwardFrom  For forwarded messages, sender of the original message
	 * @return  void
	 */ 
	public function setForwardFrom($forwardFrom) {
		$this->forwardFrom = $forwardFrom;
	}

	/**
	 * Get for forwarded messages, date the original message was sent in Unix time
	 *
	 * @return  int|null
	 */ 
	public function getForwardDate() {
		return $this->forwardDate;
	}

	/**
	 * Set for forwarded messages, date the original message was sent in Unix time
	 *
	 * @param  int|null  $forwardDate  For forwarded messages, date the original message was sent in Unix time
	 * @return  void
	 */ 
	public function setForwardDate($forwardDate) {
		$this->forwardDate = $forwardDate;
	}

	/**
	 * Get for replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
	 *
	 * @return  Message|null
	 */ 
	public function getReplyToMessage() {
		return $this->replyToMessage;
	}

	/**
	 * Set for replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
	 *
	 * @param  Message|null  $replyToMessage  For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
	 * @return  void
	 */ 
	public function setReplyToMessage($replyToMessage) {
		$this->replyToMessage = $replyToMessage;
	}

	/**
	 * Get for text messages, the actual UTF-8 text of the message
	 *
	 * @return  string|null
	 */ 
	public function getText() {
		return $this->text;
	}

	/**
	 * Set for text messages, the actual UTF-8 text of the message
	 *
	 * @param  string|null  $text  For text messages, the actual UTF-8 text of the message
	 * @return  void
	 */ 
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * Get for text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
	 *
	 * @return  MessageEntity[]
	 */ 
	public function getEntities(): array {
		return $this->entities;
	}

	/**
	 * Set for text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
	 *
	 * @param  MessageEntity[]  $entities  For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
	 * @return  void
	 */ 
	public function setEntities(array $entities) {
		$this->entities = $entities;
	}

	/**
	 * Get the value of captionEntities
	 *
	 * @return  MessageEntity[]
	 */ 
	public function getCaptionEntities(): array {
		return $this->captionEntities;
	}

	/**
	 * Set the value of captionEntities
	 *
	 * @param  MessageEntity[]  $captionEntities
	 * @return  void
	 */ 
	public function setCaptionEntities(array $captionEntities) {
		$this->captionEntities = $captionEntities;
	}

	/**
	 * Get message is an audio file, information about the file
	 *
	 * @return  Audio
	 */ 
	public function getAudio(): Audio {
		return $this->audio;
	}

	/**
	 * Set message is an audio file, information about the file
	 *
	 * @param  Audio  $audio  Message is an audio file, information about the file
	 * @return  void
	 */ 
	public function setAudio(Audio $audio) {
		$this->audio = $audio;
	}

	/**
	 * Get message is a general file, information about the file
	 *
	 * @return  Document
	 */ 
	public function getDocument(): Document {
		return $this->document;
	}

	/**
	 * Set message is a general file, information about the file
	 *
	 * @param  Document  $document  Message is a general file, information about the file
	 * @return  void
	 */ 
	public function setDocument(Document $document) {
		$this->document = $document;
	}

	/**
	 * Get message is a photo, available sizes of the photo
	 *
	 * @return  Photo
	 */ 
	public function getPhoto(): Photo {
		return $this->photo;
	}

	/**
	 * Set message is a photo, available sizes of the photo
	 *
	 * @param  Photo  $photo  Message is a photo, available sizes of the photo
	 * @return  void
	 */ 
	public function setPhoto(Photo $photo) {
		$this->photo = $photo;
	}

	/**
	 * Get message is a sticker, information about the sticker
	 *
	 * @return  Sticker
	 */ 
	public function getSticker(): Sticker {
		return $this->sticker;
	}

	/**
	 * Set message is a sticker, information about the sticker
	 *
	 * @param  Sticker  $sticker  Message is a sticker, information about the sticker
	 * @return  void
	 */ 
	public function setSticker(Sticker $sticker) {
		$this->sticker = $sticker;
	}

	/**
	 * Get message is a video, information about the video
	 *
	 * @return  Video
	 */ 
	public function getVideo(): Video {
		return $this->video;
	}

	/**
	 * Set message is a video, information about the video
	 *
	 * @param  Video  $video  Message is a video, information about the video
	 * @return  void
	 */ 
	public function setVideo(Video $video) {
		$this->video = $video;
	}

	/**
	 * Get message is a voice message, information about the file
	 *
	 * @return  Voice
	 */ 
	public function getVoice(): Voice {
		return $this->voice;
	}

	/**
	 * Set message is a voice message, information about the file
	 *
	 * @param  Voice  $voice  Message is a voice message, information about the file
	 * @return  void
	 */ 
	public function setVoice(Voice $voice) {
		$this->voice = $voice;
	}

	/**
	 * Get text description of the video (usually empty)
	 *
	 * @return  string
	 */ 
	public function getCaption(): string {
		return $this->caption;
	}

	/**
	 * Set text description of the video (usually empty)
	 *
	 * @param  string  $caption  Text description of the video (usually empty)
	 * @return  void
	 */ 
	public function setCaption(string $caption) {
		$this->caption = $caption;
	}

	/**
	 * Get message is a shared contact, information about the contact
	 *
	 * @return  Contact
	 */ 
	public function getContact(): Contact {
		return $this->contact;
	}

	/**
	 * Set message is a shared contact, information about the contact
	 *
	 * @param  Contact  $contact  Message is a shared contact, information about the contact
	 * @return  void
	 */ 
	public function setContact(Contact $contact) {
		$this->contact = $contact;
	}

	/**
	 * Get message is a shared location, information about the location
	 *
	 * @return  Location
	 */ 
	public function getLocation(): Location {
		return $this->location;
	}

	/**
	 * Set message is a shared location, information about the location
	 *
	 * @param  Location  $location  Message is a shared location, information about the location
	 * @return  void
	 */ 
	public function setLocation(Location $location) {
		$this->location = $location;
	}

	/**
	 * Get message is a venue, information about the venue
	 *
	 * @return  Venue
	 */ 
	public function getVenue(): Venue {
		return $this->venue;
	}

	/**
	 * Set message is a venue, information about the venue
	 *
	 * @param  Venue  $venue  Message is a venue, information about the venue
	 * @return  void
	 */ 
	public function setVenue(Venue $venue) {
		$this->venue = $venue;
	}

	/**
	 * Get a new member was added to the group, information about them (this member may be bot itself)
	 *
	 * @return  User
	 */ 
	public function getNewChatMember(): User {
		return $this->newChatMember;
	}

	/**
	 * Set a new member was added to the group, information about them (this member may be bot itself)
	 *
	 * @param  User  $newChatMember  A new member was added to the group, information about them (this member may be bot itself)
	 * @return  void
	 */ 
	public function setNewChatMember(User $newChatMember) {
		$this->newChatMember = $newChatMember;
	}

	/**
	 * Get a member was removed from the group, information about them (this member may be bot itself)
	 *
	 * @return  User
	 */ 
	public function getLeftChatMember(): User {
		return $this->leftChatMember;
	}

	/**
	 * Set a member was removed from the group, information about them (this member may be bot itself)
	 *
	 * @param  User  $leftChatMember  A member was removed from the group, information about them (this member may be bot itself)
	 * @return  void
	 */ 
	public function setLeftChatMember(User $leftChatMember) {
		$this->leftChatMember = $leftChatMember;
	}

	/**
	 * Get a group title was changed to this value
	 *
	 * @return  string
	 */ 
	public function getNewChatTitle(): string {
		return $this->newChatTitle;
	}

	/**
	 * Set a group title was changed to this value
	 *
	 * @param  string  $newChatTitle  A group title was changed to this value
	 * @return  void
	 */ 
	public function setNewChatTitle(string $newChatTitle) {
		$this->newChatTitle = $newChatTitle;
	}

	/**
	 * Get a group photo was change to this value
	 *
	 * @return  ChatPhoto[]
	 */ 
	public function getNewChatPhoto(): array {
		return $this->newChatPhoto;
	}

	/**
	 * Set a group photo was change to this value
	 *
	 * @param  ChatPhoto[]  $newChatPhoto  A group photo was change to this value
	 * @return  void
	 */ 
	public function setNewChatPhoto(array $newChatPhoto) {
		$this->newChatPhoto = $newChatPhoto;
	}

	/**
	 * Get optional. Informs that the group photo was deleted
	 *
	 * @return  bool
	 */ 
	public function getDeleteChatPhoto(): bool {
		return $this->deleteChatPhoto;
	}

	/**
	 * Set optional. Informs that the group photo was deleted
	 *
	 * @param  bool  $deleteChatPhoto  Optional. Informs that the group photo was deleted
	 * @return  void
	 */ 
	public function setDeleteChatPhoto(bool $deleteChatPhoto) {
		$this->deleteChatPhoto = $deleteChatPhoto;
	}

	/**
	 * Get informs that the group has been created
	 *
	 * @return  bool
	 */ 
	public function getGroupChatCreated(): bool {
		return $this->groupChatCreated;
	}

	/**
	 * Set informs that the group has been created
	 *
	 * @param  bool  $groupChatCreated  Informs that the group has been created
	 * @return  void
	 */ 
	public function setGroupChatCreated(bool $groupChatCreated) {
		$this->groupChatCreated = $groupChatCreated;
	}

	/**
	 * Get service message: the supergroup has been created
	 *
	 * @return  bool
	 */ 
	public function getSupergroupChatCreated(): bool {
		return $this->supergroupChatCreated;
	}

	/**
	 * Set service message: the supergroup has been created
	 *
	 * @param  bool  $supergroupChatCreated  Service message: the supergroup has been created
	 * @return  void
	 */ 
	public function setSupergroupChatCreated(bool $supergroupChatCreated) {
		$this->supergroupChatCreated = $supergroupChatCreated;
	}

	/**
	 * Get service message: the channel has been created
	 *
	 * @return  bool
	 */ 
	public function getChannelChatCreated(): bool {
		return $this->channelChatCreated;
	}

	/**
	 * Set service message: the channel has been created
	 *
	 * @param  bool  $channelChatCreated  Service message: the channel has been created
	 * @return  void
	 */ 
	public function setChannelChatCreated(bool $channelChatCreated) {
		$this->channelChatCreated = $channelChatCreated;
	}

	/**
	 * Get the group has been migrated to a supergroup with the specified identifier, not exceeding 1e13 by absolute value
	 *
	 * @return  int
	 */ 
	public function getMigrateToChatId(): int {
		return $this->migrateToChatId;
	}

	/**
	 * Set the group has been migrated to a supergroup with the specified identifier, not exceeding 1e13 by absolute value
	 *
	 * @param  int  $migrateToChatId  The group has been migrated to a supergroup with the specified identifier, not exceeding 1e13 by absolute value
	 * @return  void
	 */ 
	public function setMigrateToChatId(int $migrateToChatId) {
		$this->migrateToChatId = $migrateToChatId;
	}

	/**
	 * Get the supergroup has been migrated from a group with the specified identifier, not exceeding 1e13 by absolute value
	 *
	 * @return  int
	 */ 
	public function getMigrateFromChatId(): int {
		return $this->migrateFromChatId;
	}

	/**
	 * Set the supergroup has been migrated from a group with the specified identifier, not exceeding 1e13 by absolute value
	 *
	 * @param  int  $migrateFromChatId  The supergroup has been migrated from a group with the specified identifier, not exceeding 1e13 by absolute value
	 * @return  void
	 */ 
	public function setMigrateFromChatId(int $migrateFromChatId) {
		$this->migrateFromChatId = $migrateFromChatId;
	}

	/**
	 * Get specified message was pinned.Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
	 *
	 * @return  Message
	 */ 
	public function getPinnedMessage(): Message {
		return $this->pinnedMessage;
	}

	/**
	 * Set specified message was pinned.Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
	 *
	 * @param  Message  $pinnedMessage  Specified message was pinned.Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
	 * @return  void
	 */ 
	public function setPinnedMessage(Message $pinnedMessage) {
		$this->pinnedMessage = $pinnedMessage;
	}

	/**
	 * Get message is an invoice for a payment, information about the invoice.
	 *
	 * @return  Invoice
	 */ 
	public function getInvoice(): Invoice {
		return $this->invoice;
	}

	/**
	 * Set message is an invoice for a payment, information about the invoice.
	 *
	 * @param  Invoice  $invoice  Message is an invoice for a payment, information about the invoice.
	 * @return  void
	 */ 
	public function setInvoice(Invoice $invoice) {
		$this->invoice = $invoice;
	}

	/**
	 * Get message is a service message about a successful payment, information about the payment.
	 *
	 * @return  SuccessfulPayment
	 */ 
	public function getSuccessfulPayment(): SuccessfulPayment {
		return $this->successfulPayment;
	}

	/**
	 * Set message is a service message about a successful payment, information about the payment.
	 *
	 * @param  SuccessfulPayment  $successfulPayment  Message is a service message about a successful payment, information about the payment.
	 * @return  void
	 */ 
	public function setSuccessfulPayment(SuccessfulPayment $successfulPayment) {
		$this->successfulPayment = $successfulPayment;
	}

	/**
	 * Get for messages forwarded from channels, signature of the post author if present
	 *
	 * @return  string
	 */ 
	public function getForwardSignature(): string {
		return $this->forwardSignature;
	}

	/**
	 * Set for messages forwarded from channels, signature of the post author if present
	 *
	 * @param  string  $forwardSignature  For messages forwarded from channels, signature of the post author if present
	 * @return  void
	 */ 
	public function setForwardSignature(string $forwardSignature) {
		$this->forwardSignature = $forwardSignature;
	}

	/**
	 * Get signature of the post author for messages in channels
	 *
	 * @return  string
	 */ 
	public function getAuthorSignature(): string {
		return $this->authorSignature;
	}

	/**
	 * Set signature of the post author for messages in channels
	 *
	 * @param  string  $authorSignature  Signature of the post author for messages in channels
	 * @return  void
	 */ 
	public function setAuthorSignature(string $authorSignature) {
		$this->authorSignature = $authorSignature;
	}

	/**
	 * Get the domain name of the website on which the user has logged in.
	 *
	 * @return  string
	 */ 
	public function getConnectedWebsite(): string {
		return $this->connectedWebsite;
	}

	/**
	 * Set the domain name of the website on which the user has logged in.
	 *
	 * @param  string  $connectedWebsite  The domain name of the website on which the user has logged in.
	 * @return  void
	 */ 
	public function setConnectedWebsite(string $connectedWebsite) {
		$this->connectedWebsite = $connectedWebsite;
	}
}