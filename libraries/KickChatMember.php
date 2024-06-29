<?php

namespace packages\telebot;

class KickChatMember extends Method
{
    /**
     * @var int|string
     */
    protected $chatId;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int|null
     */
    protected $untilDate;

    /**
     * @param int|string $chatId Unique identifier for the target group or username of the target supergroup (in the format @supergroupusername)
     * @param int        $userId Unique identifier of the target user
     */
    public function __construct($chatId, int $userId)
    {
        $this->chatId = $chatId;
        $this->userId = $userId;
    }

    /**
     * @param int|string $chatId
     *
     * @return void
     */
    public function setChatID($chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @return int|string
     */
    public function getChatID()
    {
        return $this->chatId;
    }

    /**
     * Get the value of userId.
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the value of userId.
     *
     * @return void
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get the value of untilDate.
     *
     * @return int|null
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * Set the value of untilDate.
     *
     * @param int|null $untilDate
     *
     * @return void
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'until_date' => $this->untilDate,
        ];
    }

    /**
     * @return bool
     */
    public function handleResponse($response)
    {
        return $response;
    }
}
