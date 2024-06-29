<?php
namespace packages\telebot;
class InlineQuery extends Type {
	/**
	 * Unique identifier for this query
	 * 
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
	 * Text of the query
	 * 
	 * @var string
	 */
	protected $query;

	/**
	 * Offset of the results to be returned, can be controlled by the bot
	 * 
	 * @var string
	 */
	protected $offset;

	/**
	 * Sender location, only for bots that request user location
	 * 
	 * @var Location|null
	 */
	protected $location;

	public function __construct(string $id, User $from, string $query, string $offset){
		$this->id = $id;
		$this->from = $from;
		$this->query = $query;
		$this->offset = $offset;
	}
	public static function fromJson($data) {
		$object = new self($data->id, User::fromJson($data->from), $data->query, $data->offset);
		if (isset($data->location)) {
			$object->location = Location::fromJson($data->location);
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'id' => $this->id,
			'from' => $this->from->toJson(),
			'query' => $this->query,
			'offset' => $this->offset,
		);
		if ($this->location) {
			$data['location'] = $this->location->toJson();
		}
		return $data;
	}
	

	/**
	 * Get unique identifier for this query
	 *
	 * @return  string
	 */ 
	public function getId(): string {
		return $this->id;
	}

	/**
	 * Set unique identifier for this query
	 *
	 * @param  string  $id  Unique identifier for this query
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
	 * Get text of the query
	 *
	 * @return  string
	 */ 
	public function getQuery(): string {
		return $this->query;
	}

	/**
	 * Set text of the query
	 *
	 * @param  string  $query  Text of the query
	 * @return  void
	 */ 
	public function setQuery(string $query) {
		$this->query = $query;
	}

	/**
	 * Get offset of the results to be returned, can be controlled by the bot
	 *
	 * @return  string
	 */ 
	public function getOffset(): string {
		return $this->offset;
	}

	/**
	 * Set offset of the results to be returned, can be controlled by the bot
	 *
	 * @param  string  $offset  Offset of the results to be returned, can be controlled by the bot
	 * @return  void
	 */ 
	public function setOffset(string $offset) {
		$this->offset = $offset;
	}

	/**
	 * Get sender location, only for bots that request user location
	 *
	 * @return  Location|null
	 */ 
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Set sender location, only for bots that request user location
	 *
	 * @param  Location|null  $location  Sender location, only for bots that request user location
	 * @return  void
	 */ 
	public function setLocation($location) {
		$this->location = $location;
	}
}