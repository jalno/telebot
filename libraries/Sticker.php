<?php

namespace packages\telebot;

class Sticker extends Type
{
    /**
     * @var int
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
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * @var int
     */
    protected $fileSize;

    public function __construct(int $fileId, int $width, int $height)
    {
        $this->fileId = $fileId;
        $this->width = $width;
        $this->height = $height;
    }

    public static function fromJson($data)
    {
        $object = new self($data->file_id, $data->width, $data->height);
        if (isset($data->thumb)) {
            $object->thumb = PhotoSize::fromJson($data->thumb);
        }
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
    public function getFileId(): int
    {
        return $this->fileId;
    }

    /**
     * Set the value of fileId.
     *
     * @return void
     */
    public function setFileId(int $fileId)
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
     * Get the value of thumb.
     */
    public function getThumb(): PhotoSize
    {
        return $this->thumb;
    }

    /**
     * Set the value of thumb.
     *
     * @return void
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
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
