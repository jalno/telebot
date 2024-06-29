<?php

namespace packages\telebot;

class GetFile extends Method
{
    /**
     * @var int
     */
    protected $fileId;

    public function __construct(int $fileId)
    {
        $this->fileId = $fileId;
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

    public function toJson(): array
    {
        return [
            'file_id' => $this->fileId,
        ];
    }

    public function handleResponse($response)
    {
        return File::fromJson($response);
    }
}
