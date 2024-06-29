<?php

namespace packages\telebot;

class PromoteChatMember extends Method
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
     * @var bool
     */
    protected $canChangeInfo = true;

    /**
     * @var bool
     */
    protected $canPostMessages = true;

    /**
     * @var bool
     */
    protected $canEditMessages = true;

    /**
     * @var bool
     */
    protected $canDeleteMessages = true;

    /**
     * @var bool
     */
    protected $canInviteUsers = true;

    /**
     * @var bool
     */
    protected $canRestrictMembers = true;

    /**
     * @var bool
     */
    protected $canPinMessages = true;

    /**
     * @var bool
     */
    protected $canPromoteMembers = true;

    /**
     * @var int
     */
    protected $messageId;

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
     * Get the value of canChangeInfo.
     */
    public function getCanChangeInfo(): bool
    {
        return $this->canChangeInfo;
    }

    /**
     * Set the value of canChangeInfo.
     *
     * @return void
     */
    public function setCanChangeInfo(bool $canChangeInfo)
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * Get the value of canPostMessages.
     */
    public function getCanPostMessages(): bool
    {
        return $this->canPostMessages;
    }

    /**
     * Set the value of canPostMessages.
     *
     * @return void
     */
    public function setCanPostMessages(bool $canPostMessages)
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * Get the value of canEditMessages.
     */
    public function getCanEditMessages(): bool
    {
        return $this->canEditMessages;
    }

    /**
     * Set the value of canEditMessages.
     *
     * @return void
     */
    public function setCanEditMessages(bool $canEditMessages)
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * Get the value of canDeleteMessages.
     */
    public function getCanDeleteMessages(): bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * Set the value of canDeleteMessages.
     *
     * @return void
     */
    public function setCanDeleteMessages(bool $canDeleteMessages)
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * Get the value of canInviteUsers.
     */
    public function getCanInviteUsers(): bool
    {
        return $this->canInviteUsers;
    }

    /**
     * Set the value of canInviteUsers.
     *
     * @return void
     */
    public function setCanInviteUsers(bool $canInviteUsers)
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * Get the value of canRestrictMembers.
     */
    public function getCanRestrictMembers(): bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * Set the value of canRestrictMembers.
     *
     * @return void
     */
    public function setCanRestrictMembers(bool $canRestrictMembers)
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * Get the value of canPinMessages.
     */
    public function getCanPinMessages(): bool
    {
        return $this->canPinMessages;
    }

    /**
     * Set the value of canPinMessages.
     *
     * @return void
     */
    public function setCanPinMessages(bool $canPinMessages)
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @param int $messageId
     *
     * @return void
     */
    public function setMessageId($messageId)
    {
        $this->chatId = $messageId;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function toJson(): array
    {
        return [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
        ];
    }

    public function handleResponse($response)
    {
        return $response;
    }
}
