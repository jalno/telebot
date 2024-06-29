<?php
namespace packages\telebot;
class CallbackQuery extends Type {
	/**
	 * @var string
	 */
	protected $id;
	
	/**
	 * Sender
	 * 
	 * @var User
	 */
	protected $from;

	/**
	 * Message with the callback button that originated the query.
     * Note that message content and message date will not be available
     * if the message is too old
	 * 
	 * @var Message|null
	 */
	protected $message;

	/**
	 * Identifier of the message sent via the bot in inline mode,
     * that originated the query.
	 * 
	 * @var string|null
	 */
	protected $inlineMessageId;

	/**
	 * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
	 * 
	 * @var string|null
	 */
	protected $chatInstance;

	/**
	 * Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
	 * 
	 * @var string|null
	 */
	protected $data;

	/**
	 * Short name of a Game to be returned,
     * serves as the unique identifier for the game
	 * 
	 * @var string|null
	 */
	protected $gameShortName;

	public function __construct(string $id, User $from){
		$this->id = $id;
		$this->from = $from;
	}
	public static function fromJson($data) {
		$object = new self($data->id, User::fromJson($data->from));
		if (isset($data->message)) {
			$object->message = Message::fromJson($data->message);
		}
		if (isset($data->inline_message_id)) {
			$object->inlineMessageId = $data->inline_message_id;
		}
		if (isset($data->chat_instance)) {
			$object->chatInstance = $data->chat_instance;
		}
		if (isset($data->data)) {
			$object->data = $data->data;
		}
		if (isset($data->game_short_name)) {
			$object->gameShortName = $data->game_short_name;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'id' => $this->id,
			'from' => $this->from->toJson(),
		);
		if ($this->inlineMessageId) {
			$data['inline_message_id'] = $this->inlineMessageId;
		}
		if ($this->chatInstance) {
			$data['chat_instance'] = $this->chatInstance;
		}
		if ($this->data) {
			$data['data'] = $this->data;
		}
		if ($this->gameShortName) {
			$data['game_short_name'] = $this->gameShortName;
		}
		return $data;
	}
	
	/**
	 * Get the value of id
	 *
	 * @return  string
	 */ 
	public function getId(): string {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param  string  $id
	 * @return  void
	 */ 
	public function setId(string $id) {
		$this->id = $id;
	}

	/**
	 * Get sender
	 *
	 * @return  User
	 */ 
	public function getFrom(): User {
		return $this->from;
	}

	/**
	 * Set sender
	 *
	 * @param  User  $from  Sender
	 * @return  void
	 */ 
	public function setFrom(User $from) {
		$this->from = $from;
	}

	/**
	 * Get if the message is too old
	 *
	 * @return  Message|null
	 */ 
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Set if the message is too old
	 *
	 * @param  Message|null  $message  if the message is too old
	 * @return  void
	 */ 
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Get that originated the query.
	 *
	 * @return  string|null
	 */ 
	public function getInlineMessageId() {
		return $this->inlineMessageId;
	}

	/**
	 * Set that originated the query.
	 *
	 * @param  string|null  $inlineMessageId  that originated the query.
	 * @return  void
	 */ 
	public function setInlineMessageId($inlineMessageId) {
		$this->inlineMessageId = $inlineMessageId;
	}

	/**
	 * Get useful for high scores in games.
	 *
	 * @return  string|null
	 */ 
	public function getChatInstance() {
		return $this->chatInstance;
	}

	/**
	 * Set useful for high scores in games.
	 *
	 * @param  string|null  $chatInstance  Useful for high scores in games.
	 * @return  void
	 */ 
	public function setChatInstance($chatInstance) {
		$this->chatInstance = $chatInstance;
	}

	/**
	 * Get be aware that a bad client can send arbitrary data in this field.
	 *
	 * @return  string|null
	 */ 
	public function getData() {
		return $this->data;
	}

	/**
	 * Set be aware that a bad client can send arbitrary data in this field.
	 *
	 * @param  string|null  $data  Be aware that a bad client can send arbitrary data in this field.
	 * @return  void
	 */ 
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * Get serves as the unique identifier for the game
	 *
	 * @return  string|null
	 */ 
	public function getGameShortName() {
		return $this->gameShortName;
	}

	/**
	 * Set serves as the unique identifier for the game
	 *
	 * @param  string|null  $gameShortName  serves as the unique identifier for the game
	 * @return  void
	 */ 
	public function setGameShortName($gameShortName) {
		$this->gameShortName = $gameShortName;
	}
}