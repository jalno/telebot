<?php

namespace packages\telebot;

class Voice extends Type
{
    /**
     * @var int
     */
    protected $fileId;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var int
     */
    protected $fileSize;

    public function __construct(int $fileId, int $duration)
    {
        $this->fileId = $fileId;
        $this->duration = $duration;
    }

    public static function fromJson($data)
    {
        $object = new self($data->file_id, $data->duration);
        if (isset($data->mime_type)) {
            $object->mimeType = $data->mime_type;
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
            'duration' => $this->duration,
            'mime_type' => $this->mimeType,
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
     * Get the value of duration.
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Set the value of duration.
     *
     * @return void
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get the value of mimeType.
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * Set the value of mimeType.
     *
     * @return void
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
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
