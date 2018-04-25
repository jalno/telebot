<?php
namespace packages\telebot;
class CallbackQuery extends Type {
	/**
	 * The unique identifier for the result that was chosen.
	 * @var string
	 */
	protected $resultId;
	
	/**
	 * Sender
	 * 
	 * @var User
	 */
	protected $from;

	/**
	 * Sender location, only for bots that require user location
	 *
	 * @var Location|null
	 */
	protected $location;

	/**
	 * Identifier of the sent inline message.
	 * Available only if there is an inline keyboard attached to the message.
	 * Will be also received in callback queries and can be used to edit the message.
	 *
	 * @var string|null
	 */
	protected $inlineMessageId;

	/**
	 * The query that was used to obtain the result.
	 *
	 * @var string
	 */
	protected $query;


	public function __construct(string $resultId, User $from, string $query){
		$this->resultId = $resultId;
		$this->from = $from;
		$this->query = $query;
	}
	public static function fromJson($data) {
		$object = new static($data->id, User::fromJson($data->from), $data->query);
		if (isset($data->location)) {
			$object->location = Location::fromJson($data->location);
		}
		if (isset($data->inline_message_id)) {
			$object->inlineMessageId = $data->inline_message_id;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'id' => $this->id,
			'from' => $this->from->toJson(),
			'query' => $this->query,
		);
		if ($this->inlineMessageId) {
			$data['inline_message_id'] = $this->inlineMessageId;
		}
		if ($this->location) {
			$data['location'] = $this->location->toJson();
		}
		return $data;
	}
	

	/**
	 * Get the unique identifier for the result that was chosen.
	 *
	 * @return  string
	 */ 
	public function getResultId(): string {
		return $this->resultId;
	}

	/**
	 * Set the unique identifier for the result that was chosen.
	 *
	 * @param  string  $resultId  The unique identifier for the result that was chosen.
	 * @return  void
	 */ 
	public function setResultId(string $resultId) {
		$this->resultId = $resultId;
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
	 * Get sender location, only for bots that require user location
	 *
	 * @return  Location|null
	 */ 
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Set sender location, only for bots that require user location
	 *
	 * @param  Location|null  $location  Sender location, only for bots that require user location
	 * @return  void
	 */ 
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Get will be also received in callback queries and can be used to edit the message.
	 *
	 * @return  string|null
	 */ 
	public function getInlineMessageId() {
		return $this->inlineMessageId;
	}

	/**
	 * Set will be also received in callback queries and can be used to edit the message.
	 *
	 * @param  string|null  $inlineMessageId  Will be also received in callback queries and can be used to edit the message.
	 * @return  void
	 */ 
	public function setInlineMessageId($inlineMessageId) {
		$this->inlineMessageId = $inlineMessageId;
	}

	/**
	 * Get the query that was used to obtain the result.
	 *
	 * @return  string
	 */ 
	public function getQuery(): string {
		return $this->query;
	}

	/**
	 * Set the query that was used to obtain the result.
	 *
	 * @param  string  $query  The query that was used to obtain the result.
	 * @return  void
	 */ 
	public function setQuery(string $query) {
		$this->query = $query;
	}
}