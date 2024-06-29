<?php

namespace packages\telebot;

/**
 * This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 */
class InputVenueMessageContent extends InputMessageContent
{
    /**
     * Latitude of the location in degrees.
     *
     * @var float
     */
    protected $latitude;

    /**
     * Longitude of the location in degrees.
     *
     * @var float
     */
    protected $longitude;

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

    public function __construct(float $latitude, float $longitude, string $title, string $address)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        $this->address = $address;
    }

    public static function fromJson($data)
    {
        $object = new self($data->latitude, $data->longitude, $data->title, $data->address);
        if (isset($data->foursquare_id)) {
            $object->foursquareId = $data->foursquare_id;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquareId,
        ];
    }

    /**
     * Get latitude of the location in degrees.
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Set latitude of the location in degrees.
     *
     * @param float $latitude Latitude of the location in degrees
     *
     * @return void
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get longitude of the location in degrees.
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Set longitude of the location in degrees.
     *
     * @param float $longitude Longitude of the location in degrees
     *
     * @return void
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get the value of title.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     *
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the value of address.
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address.
     *
     * @return void
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * Get the value of foursquareId.
     *
     * @return string|null
     */
    public function getFoursquareId()
    {
        return $this->foursquareId;
    }

    /**
     * Set the value of foursquareId.
     *
     * @param string|null $foursquareId
     *
     * @return void
     */
    public function setFoursquareId($foursquareId)
    {
        $this->foursquareId = $foursquareId;
    }
}
