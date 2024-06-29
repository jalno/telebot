<?php
namespace packages\telebot;
class InputContactMessageContent extends InputMessageContent {
	/**
     * Contact's phone number
     *
     * @var string
     */
	protected $phoneNumber;

	/**
     * Contact's first name
     *
     * @var string
     */
	protected $firstName;
	
    /**
     * Contact's last name
     *
     * @var string|null
     */
	protected $lastName;
	
	public function __construct(string $phoneNumber, string $firstName){
		$this->phoneNumber = $phoneNumber;
		$this->firstName = $firstName;
	}
	public static function fromJson($data) {
		$object = new self($data->phone_number, $data->first_name);
		if (isset($data->last_name)) {
			$object->lastName = $data->last_name;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'phone_number' => $this->phoneNumber,
			'first_name' => $this->firstName,
		);
		if ($this->lastName) {
			$data['last_name'] = $this->lastName;
		}
		return $data;
	}
	

	/**
	 * Get contact's phone number
	 *
	 * @return  string
	 */ 
	public function getPhoneNumber(): string {
		return $this->phoneNumber;
	}

	/**
	 * Set contact's phone number
	 *
	 * @param  string  $phoneNumber  Contact's phone number
	 * @return  void
	 */ 
	public function setPhoneNumber(string $phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}

	/**
	 * Get contact's first name
	 *
	 * @return  string
	 */ 
	public function getFirstName(): string {
		return $this->firstName;
	}

	/**
	 * Set contact's first name
	 *
	 * @param  string  $firstName  Contact's first name
	 * @return  void
	 */ 
	public function setFirstName(string $firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Get contact's last name
	 *
	 * @return  string|null
	 */ 
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Set contact's last name
	 *
	 * @param  string|null  $lastName  Contact's last name
	 * @return  void
	 */ 
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
}
