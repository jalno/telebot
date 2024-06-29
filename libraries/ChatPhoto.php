<?php

namespace packages\telebot;

class ChatPhoto extends Type
{
    /**
     * @var string
     */
    protected $smallFileId;

    /**
     * @var string
     */
    protected $bigFileId;

    public function __construct(string $smallFileId, string $bigFileId)
    {
        $this->smallFileId = $smallFileId;
        $this->bigFileId = $bigFileId;
    }

    public static function fromJson($data)
    {
        return new self($data->small_file_id, $data->big_file_id);
    }

    public function toJson()
    {
        return [
            'small_file_id' => $this->smallFileId,
            'big_file_id' => $this->bigFileId,
        ];
    }

    /**
     * Get the value of smallFileId.
     */
    public function getSmallFileId(): string
    {
        return $this->smallFileId;
    }

    /**
     * Set the value of smallFileId.
     *
     * @return void
     */
    public function setSmallFileId(string $smallFileId)
    {
        $this->smallFileId = $smallFileId;
    }

    /**
     * Get the value of bigFileId.
     */
    public function getBigFileId(): string
    {
        return $this->bigFileId;
    }

    /**
     * Set the value of bigFileId.
     *
     * @return void
     */
    public function setBigFileId(string $bigFileId)
    {
        $this->bigFileId = $bigFileId;
    }
}
