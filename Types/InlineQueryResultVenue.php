<?php
namespace packages\telebot;
class InlineQueryResultDocument extends InlineQueryResult {
	/**
     * Latitude of the venue location in degrees
     *
     * @var float
     */
	protected $latitude;

	/**
     * Longitude of the venue location in degrees
     *
     * @var float
     */
	protected $longitude;

    /**
	 * Address of the venue
	 * 
     * @var string
     */
	protected $address;

    /**
     * Foursquare identifier of the venue if known
     *
     * @var string|null
     */
	protected $foursquareId;

    /**
     * URL of the thumbnail (jpeg only) for the document
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
	
	public function __construct(string $id, string $title, float $latitude, float $longitude, string $address){
		parent::__construct('location', $id, $title);
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->address = $address;
	}
	
	public static function fromJson($data) {
		$object = new static($data->id, $data->title, $data->latitude, $data->longitude, $data->address);
		if (isset($data->thumb_url)) {
			$object->thumbUrl = $data->thumb_url;
		}
		if (isset($data->thumb_width)) {
			$object->thumbWidth = $data->thumb_width;
		}
		if (isset($data->thumb_height)) {
			$object->thumbHeight = $data->thumb_height;
		}
		if (isset($data->title)) {
			$object->title = $data->title;
		}
		if (isset($data->foursquare_id)) {
			$object->foursquareId = $data->foursquare_id;
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
		if ($this->latitude) {
			$data['latitude'] = $this->latitude;
		}
		if ($this->longitude) {
			$data['longitude'] = $this->longitude;
		}
		if ($this->address) {
			$data['address'] = $this->address;
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
		if ($this->foursquareId) {
			$data['foursquare_id'] = $this->foursquareId;
		}
		return $data;
	}

	/**
	 * Get location latitude in degrees
	 *
	 * @return  float
	 */ 
	public function getLatitude(): float {
		return $this->latitude;
	}

	/**
	 * Set location latitude in degrees
	 *
	 * @param  float  $latitude  Location latitude in degrees
	 * @return  void
	 */ 
	public function setLatitude(float $latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * Get location longitude in degrees
	 *
	 * @return  float
	 */ 
	public function getLongitude(): float {
		return $this->longitude;
	}

	/**
	 * Set location longitude in degrees
	 *
	 * @param  float  $longitude  Location longitude in degrees
	 * @return  void
	 */ 
	public function setLongitude(float $longitude) {
		$this->longitude = $longitude;
	}
	

	/**
	 * Get address of the venue
	 *
	 * @return  string
	 */ 
	public function getAddress(): string {
		return $this->address;
	}

	/**
	 * Set address of the venue
	 *
	 * @param  string  $address  Address of the venue
	 * @return  void
	 */ 
	public function setAddress(string $address) {
		$this->address = $address;
	}

	/**
	 * Get foursquare identifier of the venue if known
	 *
	 * @return  string|null
	 */ 
	public function getFoursquareId() {
		return $this->foursquareId;
	}

	/**
	 * Set foursquare identifier of the venue if known
	 *
	 * @param  string|null  $foursquareId  Foursquare identifier of the venue if known
	 * @return  void
	 */ 
	public function setFoursquareId($foursquareId) {
		$this->foursquareId = $foursquareId;
	}

	/**
	 * Get uRL of the thumbnail (jpeg only) for the document
	 *
	 * @return  string|null
	 */ 
	public function getThumbUrl() {
		return $this->thumbUrl;
	}

	/**
	 * Set uRL of the thumbnail (jpeg only) for the document
	 *
	 * @param  string|null  $thumbUrl  URL of the thumbnail (jpeg only) for the document
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
