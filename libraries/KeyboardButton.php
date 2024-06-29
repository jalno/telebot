<?php
namespace packages\telebot;
/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this object to specify text of the button.
 */
class KeyboardButton extends Type {
	/**
	 * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
	 * 
	 * @var string
	 */
	protected $text;
	
	/**
	 * If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
	 * 
	 * @var bool
	 */
	protected $requestContact = false;

	/**
	 * If True, the user's current location will be sent when the button is pressed. Available in private chats only
	 * 
	 * @var bool
	 */
	protected $requestLocation = false;

	public function __construct(string $text){
		$this->text = $text;
	}
	public static function fromJson($data) {
		$object = new self($data->text);
		if (isset($data->request_contact)) {
			$object->requestContact = $data->request_contact;
		}
		if (isset($data->request_location)) {
			$object->requestLocation = $data->request_location;
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'text' => $this->text,
		);
		if ($this->requestLocation) {
			$data['request_location'] = $this->requestLocation;
		}
		if ($this->requestContact) {
			$data['request_contact'] = $this->requestContact;
		}
		return $data;
	}


	/**
	 * Get text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
	 *
	 * @return  string
	 */ 
	public function getText(): string {
		return $this->text;
	}

	/**
	 * Set text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
	 *
	 * @param  string  $text  Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
	 * @return  void
	 */ 
	public function setText(string $text) {
		$this->text = $text;
	}

	/**
	 * Get if True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
	 *
	 * @return  bool
	 */ 
	public function getRequestContact(): bool {
		return $this->requestContact;
	}

	/**
	 * Set if True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
	 *
	 * @param  bool  $requestContact  If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
	 * @return  void
	 */ 
	public function setRequestContact(bool $requestContact) {
		$this->requestContact = $requestContact;
	}

	/**
	 * Get if True, the user's current location will be sent when the button is pressed. Available in private chats only
	 *
	 * @return  bool
	 */ 
	public function getRequestLocation(): bool {
		return $this->requestLocation;
	}

	/**
	 * Set if True, the user's current location will be sent when the button is pressed. Available in private chats only
	 *
	 * @param  bool  $requestLocation  If True, the user's current location will be sent when the button is pressed. Available in private chats only
	 * @return  void
	 */ 
	public function setRequestLocation(bool $requestLocation) {
		$this->requestLocation = $requestLocation;
	}
}