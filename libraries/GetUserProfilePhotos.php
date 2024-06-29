<?php

namespace packages\telebot;

class GetUserProfilePhotos extends Method
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var int
     */
    protected $limit;

    public function __construct(int $userId, int $offset = 0, int $limit = 100)
    {
        $this->userId = $userId;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    /**
     * @return void
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return void
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Get the value of limit.
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Set the value of limit.
     *
     * @return void
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    public function toJson(): array
    {
        return [
            'user_id' => $this->userId,
            'offset' => $this->offset,
            'limit' => $this->limit,
        ];
    }

    public function handleResponse($response)
    {
        return UserProfilePhotos::fromJson($response);
    }
}
