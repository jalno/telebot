<?php

namespace packages\telebot;

class PhotoSize extends Type
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var int
     */
    protected $fileSize;

    public function __construct(string $fileId, int $width, int $height)
    {
        $this->fileId = $fileId;
        $this->width = $width;
        $this->height = $height;
    }

    public static function fromJson($data)
    {
        $object = new self($data->file_id, $data->width, $data->height);
        if (isset($data->file_size)) {
            $object->fileSize = $data->file_size;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'file_id' => $this->fileId,
            'width' => $this->width,
            'height' => $this->height,
            'file_size' => $this->fileSize,
        ];
    }

    /**
     * Get the value of fileId.
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * Set the value of fileId.
     *
     * @return void
     */
    public function setFileId(string $fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * Get the value of width.
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Set the value of width.
     *
     * @return void
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * Get the value of height.
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * Set the value of height.
     *
     * @return void
     */
    public function setHeight(string $height)
    {
        $this->height = $height;
    }

    /**
     * Get the value of fileSize.
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * Set the value of fileSize.
     *
     * @return void
     */
    public function setFileSize(int $fileSize)
    {
        $this->fileSize = $fileSize;
    }
}
