<?php
namespace packages\telebot;
class User extends Type {
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $firstName;

	/**
	 * @var string|null
	 */
	protected $lastName;

	/**
	 * @var string|null
	 */
	protected $username;

	/**
	 * @var string|null
	 */
	protected $languageCode;

	/**
	 * @var bool
	 */
	protected $isBot = false;

	public function __construct(int $id, string $firstName){
		$this->id = $id;
		$this->firstName = $firstName;
	}
	public static function fromJson($data) {
		$object = new self($data->id, $data->first_name);
		if (isset($data->last_name)) {
			$object->lastName = $data->last_name;
		}
		if (isset($data->username)) {
			$object->username = $data->username;
		}
		if (isset($data->language_code)) {
			$object->languageCode = $data->language_code;
		}
		if (isset($data->is_bot)) {
			$object->isBot = $data->is_bot;
		}
		return $object;
	}
	public function toJson() {
		return array(
			'id' => $this->id,
			'first_name' => $this->firstName,
			'last_name' => $this->lastName,
			'username' => $this->username,
			'language_code' => $this->languageCode,
			'is_bot' => $this->isBot,
		);
	}
	
	/**
	 * Get the value of id
	 *
	 * @return  int
	 */ 
	public function getId(): int {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param  int  $id
	 * @return  void
	 */ 
	public function setId(int $id) {
		$this->id = $id;
	}

	/**
	 * Get the value of firstName
	 *
	 * @return  string
	 */ 
	public function getFirstName(): string {
		return $this->firstName;
	}

	/**
	 * Set the value of firstName
	 *
	 * @param  string  $firstName
	 * @return  void
	 */ 
	public function setFirstName(string $firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Get the value of lastName
	 *
	 * @return  string|null
	 */ 
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Set the value of lastName
	 *
	 * @param  string|null  $lastName
	 * @return  void
	 */ 
	public function setLastName($lastName) {
		$this->lastName = $lastName;
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
	 * Get the value of languageCode
	 *
	 * @return  string|null
	 */ 
	public function getLanguageCode() {
		return $this->languageCode;
	}

	/**
	 * Set the value of languageCode
	 *
	 * @param  string|null  $languageCode
	 * @return  void
	 */ 
	public function setLanguageCode($languageCode) {
		$this->languageCode = $languageCode;
	}

	/**
	 * Get the value of isBot
	 *
	 * @return  bool
	 */ 
	public function getIsBot(): bool {
		return $this->isBot;
	}

	/**
	 * Set the value of isBot
	 *
	 * @param  bool  $isBot
	 * @return  void
	 */ 
	public function setIsBot(bool $isBot) {
		$this->isBot = $isBot;
	}
}