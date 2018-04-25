<?php
namespace packages\telebot;
class InlineQueryResultContact extends InlineQueryResult {
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

    /**
     * Url of the thumbnail for the result
     *
     * @var string|null
     */
	protected $thumbUrl;

    /**
     * @var int|null
     */
	protected $thumbWidth;
    /**
     * @var int|null
     */
	protected $thumbHeight;
	
	public function __construct(string $id,string $phoneNumber, string $firstName){
		parent::__construct('contact', $id, '');
		$this->phoneNumber = $phoneNumber;
		$this->firstName = $firstName;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->phone_number, $data->first_name);
		if (isset($data->last_name)) {
			$object->lastName = $data->last_name;
		}
		if (isset($data->thumb_url)) {
			$object->thumbUrl = $data->thumb_url;
		}
		if (isset($data->thumb_width)) {
			$object->thumbWidth = $data->thumb_width;
		}
		if (isset($data->thumb_height)) {
			$object->thumbHeight = $data->thumb_height;
		}
		if (isset($data->reply_markup)) {
			$object->replyMarkup = InlineKeyboardMarkup::fromJson($data->reply_markup);
		}
		if (isset($data->input_message_content)) {
			$object->inputMessageContent = InputMessageContent::fromJson($data->input_message_content);
		}
		return $object;
	}
	public function toJson() {
		$data = parent::toJson();
		if ($this->phoneNumber) {
			$data['phone_number'] = $this->phoneNumber;
		}
		if ($this->firstName) {
			$data['first_name'] = $this->firstName;
		}
		if ($this->lastName) {
			$data['last_name'] = $this->lastName;
		}
		if ($this->thumbUrl) {
			$data['thumb_url'] = $this->thumbUrl;
		}
		if ($this->thumbWidth) {
			$data['thumb_width'] = $this->thumbWidth;
		}
		if ($this->thumbHeight) {
			$data['thumb_height'] = $this->thumbHeight;
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

	/**
	 * Get url of the thumbnail for the result
	 *
	 * @return  string|null
	 */ 
	public function getThumbUrl() {
		return $this->thumbUrl;
	}

	/**
	 * Set url of the thumbnail for the result
	 *
	 * @param  string|null  $thumbUrl  Url of the thumbnail for the result
	 * @return  void
	 */ 
	public function setThumbUrl($thumbUrl) {
		$this->thumbUrl = $thumbUrl;
	}

	/**
	 * Get the value of thumbWidth
	 *
	 * @return  int|null
	 */ 
	public function getThumbWidth() {
		return $this->thumbWidth;
	}

	/**
	 * Set the value of thumbWidth
	 *
	 * @param  int|null  $thumbWidth
	 * @return  void
	 */ 
	public function setThumbWidth($thumbWidth) {
		$this->thumbWidth = $thumbWidth;
	}

	/**
	 * Get the value of thumbHeight
	 *
	 * @return  int|null
	 */ 
	public function getThumbHeight() {
		return $this->thumbHeight;
	}

	/**
	 * Set the value of thumbHeight
	 *
	 * @param  int|null  $thumbHeight
	 * @return  void
	 */ 
	public function setThumbHeight($thumbHeight) {
		$this->thumbHeight = $thumbHeight;
	}
}
