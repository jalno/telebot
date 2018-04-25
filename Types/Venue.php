<?php
namespace packages\telebot;
class Venue extends Type {
	/**
	 * @var Location
	 */
	protected $location;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $address;

	/**
	 * @var string|null
	 */
	protected $foursquareId;

	public function __construct(Location $location, string $title, string $address){
		$this->location = $location;
		$this->title = $title;
		$this->address = $address;
	}
	public static function fromJson($data) {
		$object = new static(Location::fromJson($data->location), $data->title, $data->address);
		if (isset($data->foursquare_id)) {
			$object->foursquareId = $data->foursquare_id;
		}
		return $object;
	}
	public function toJson() {
		return array(
			'location' => $this->location->toJson(),
			'title' => $this->title,
			'address' => $this->address,
			'foursquare_id' => $this->foursquareId,
		);
	}
	
	/**
	 * Get the value of location
	 *
	 * @return  Location
	 */ 
	public function getLocation(): Location {
		return $this->location;
	}

	/**
	 * Set the value of location
	 *
	 * @param  Location  $location
	 * @return  void
	 */ 
	public function setLocation(Location $location) {
		$this->location = $location;
	}

	/**
	 * Get the value of title
	 *
	 * @return  string
	 */ 
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param  string  $title
	 * @return  void
	 */ 
	public function setTitle(string $title) {
		$this->title = $title;
	}

	/**
	 * Get the value of address
	 *
	 * @return  string
	 */ 
	public function getAddress(): string {
		return $this->address;
	}

	/**
	 * Set the value of address
	 *
	 * @param  string  $address
	 * @return  void
	 */ 
	public function setAddress(string $address) {
		$this->address = $address;
	}

	/**
	 * Get the value of foursquareId
	 *
	 * @return  string|null
	 */ 
	public function getFoursquareId() {
		return $this->foursquareId;
	}

	/**
	 * Set the value of foursquareId
	 *
	 * @param  string|null  $foursquareId
	 * @return  void
	 */ 
	public function setFoursquareId($foursquareId) {
		$this->foursquareId = $foursquareId;
	}
}