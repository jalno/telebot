<?php

namespace packages\telebot;

class Location extends Type
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $latitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function fromJson($data)
    {
        return new self($data->latitude, $data->longitude);
    }

    public function toJson()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }

    /**
     * Get the value of longitude.
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude.
     *
     * @return void
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get the value of latitude.
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude.
     *
     * @return void
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }
}
