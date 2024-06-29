<?php

namespace packages\telebot;

class ChatMember extends Type
{
    /**
     * @var User
     */
    protected $user;

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”.
     *
     * @var string
     */
    protected $status;

    /**
     * Restictred and kicked only. Date when restrictions will be lifted for this user, unix time.
     *
     * @var int|null
     */
    protected $untilDate;

    /**
     * Administrators only. True, if the administrator can change the chat title, photo and other settings.
     *
     * @var bool|null
     */
    protected $canChangeInfo;

    /**
     * Administrators only. True, if the bot is allowed to edit administrator privileges of that user.
     *
     * @var bool|null
     */
    protected $canBeEdited;

    /**
     * Administrators only. True, if the administrator can post in the channel, channels only.
     *
     * @var bool|null
     */
    protected $canPostMessages;

    /**
     * Administrators only. True, if the administrator can edit messages of other users, channels only.
     *
     * @var bool|null
     */
    protected $canEditMessages;

    /**
     * Administrators only. True, if the administrator can delete messages of other users.
     *
     * @var bool|null
     */
    protected $canDeleteMessages;

    /**
     * Administrators only. True, if the administrator can invite new users to the chat.
     *
     * @var bool|null
     */
    protected $canInviteUsers;

    /**
     * Administrators only. True, if the administrator can restrict, ban or unban chat members.
     *
     * @var bool|null
     */
    protected $canRestrictMembers;

    /**
     * Administrators only. True, if the administrator can pin messages, supergroups only.
     *
     * @var bool|null
     */
    protected $canPinMessages;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own
     * privileges or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by the user).
     *
     * @var bool|null
     */
    protected $canPromoteMembers;

    /**
     * Restricted only. True, if the user can send text messages, contacts, locations and venues.
     *
     * @var bool|null
     */
    protected $canSendMessages;

    /**
     * Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages.
     *
     * @var bool|null
     */
    protected $canSendMediaMessages;

    /**
     * Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages.
     *
     * @var bool|null
     */
    protected $canSendOtherMessages;

    /**
     * Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages.
     *
     * @var bool|null
     */
    protected $canAddWebPagePreviews;

    public function __construct(User $user, string $status)
    {
        $this->user = $user;
        $this->status = $status;
    }

    public static function fromJson($data)
    {
        $object = new self(User::fromJson($data->user), $data->status);
        if (isset($data->until_date)) {
            $object->untilDate = $data->until_date;
        }
        if (isset($data->can_be_edited)) {
            $object->canBeEdited = $data->can_be_edited;
        }
        if (isset($data->can_change_info)) {
            $object->canChangeInfo = $data->can_change_info;
        }
        if (isset($data->can_post_messages)) {
            $object->canPostMessages = $data->can_post_messages;
        }
        if (isset($data->can_edit_messages)) {
            $object->canEditMessages = $data->can_edit_messages;
        }
        if (isset($data->can_delete_messages)) {
            $object->canDeleteMessages = $data->can_delete_messages;
        }
        if (isset($data->can_invite_users)) {
            $object->canInviteUsers = $data->can_invite_users;
        }
        if (isset($data->can_restrict_members)) {
            $object->canRestrictMembers = $data->can_restrict_members;
        }
        if (isset($data->can_pin_messages)) {
            $object->canPinMessages = $data->can_pin_messages;
        }
        if (isset($data->can_promote_members)) {
            $object->canPromoteMembers = $data->can_promote_members;
        }
        if (isset($data->can_send_messages)) {
            $object->canSendMessages = $data->can_send_messages;
        }
        if (isset($data->can_send_media_messages)) {
            $object->canSendMediaMessages = $data->can_send_media_messages;
        }
        if (isset($data->can_send_other_messages)) {
            $object->canSendOtherMessages = $data->can_send_other_messages;
        }
        if (isset($data->can_add_web_page_previews)) {
            $object->canAddWebPagePreviews = $data->can_add_web_page_previews;
        }
    }

    public function toJson()
    {
        $data = [
            'user' => $this->user->toJson(),
            'status' => $this->status,
        ];
        if (isset($this->untilDate)) {
            $data['until_date'] = $this->untilDate;
        }
        if (isset($this->canBeEdited)) {
            $data['can_be_edited'] = $this->canBeEdited;
        }
        if (isset($this->canChangeInfo)) {
            $data['can_change_info'] = $this->canChangeInfo;
        }
        if (isset($this->canPostMessages)) {
            $data['can_post_messages'] = $this->canPostMessages;
        }
        if (isset($this->canEditMessages)) {
            $data['can_edit_messages'] = $this->canEditMessages;
        }
        if (isset($this->canDeleteMessages)) {
            $data['can_delete_messages'] = $this->canDeleteMessages;
        }
        if (isset($this->canInviteUsers)) {
            $data['can_invite_users'] = $this->canInviteUsers;
        }
        if (isset($this->canRestrictMembers)) {
            $data['can_restrict_members'] = $this->canRestrictMembers;
        }
        if (isset($this->canPinMessages)) {
            $data['can_pin_messages'] = $this->canPinMessages;
        }
        if (isset($this->canPromoteMembers)) {
            $data['can_promote_members'] = $this->canPromoteMembers;
        }
        if (isset($this->canSendMessages)) {
            $data['can_send_messages'] = $this->canSendMessages;
        }
        if (isset($this->canSendMediaMessages)) {
            $data['can_send_media_messages'] = $this->canSendMediaMessages;
        }
        if (isset($this->canSendOtherMessages)) {
            $data['can_send_other_messages'] = $this->canSendOtherMessages;
        }
        if (isset($this->canAddWebPagePreviews)) {
            $data['can_add_web_page_previews'] = $this->canAddWebPagePreviews;
        }

        return $data;
    }

    /**
     * Get the value of user.
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user.
     *
     * @return void
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”.
     *
     * @param string $status The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     *
     * @return void
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * Get restictred and kicked only. Date when restrictions will be lifted for this user, unix time.
     *
     * @return int|null
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * Set restictred and kicked only. Date when restrictions will be lifted for this user, unix time.
     *
     * @param int|null $untilDate Restictred and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @return void
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
    }

    /**
     * Get administrators only. True, if the administrator can change the chat title, photo and other settings.
     *
     * @return bool|null
     */
    public function getCanChangeInfo()
    {
        return $this->canChangeInfo;
    }

    /**
     * Set administrators only. True, if the administrator can change the chat title, photo and other settings.
     *
     * @param bool|null $canChangeInfo Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @return void
     */
    public function setCanChangeInfo($canChangeInfo)
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * Get administrators only. True, if the bot is allowed to edit administrator privileges of that user.
     *
     * @return bool|null
     */
    public function getCanBeEdited()
    {
        return $this->canBeEdited;
    }

    /**
     * Set administrators only. True, if the bot is allowed to edit administrator privileges of that user.
     *
     * @param bool|null $canBeEdited Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @return void
     */
    public function setCanBeEdited($canBeEdited)
    {
        $this->canBeEdited = $canBeEdited;
    }

    /**
     * Get administrators only. True, if the administrator can post in the channel, channels only.
     *
     * @return bool|null
     */
    public function getCanPostMessages()
    {
        return $this->canPostMessages;
    }

    /**
     * Set administrators only. True, if the administrator can post in the channel, channels only.
     *
     * @param bool|null $canPostMessages Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @return void
     */
    public function setCanPostMessages($canPostMessages)
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * Get administrators only. True, if the administrator can edit messages of other users, channels only.
     *
     * @return bool|null
     */
    public function getCanEditMessages()
    {
        return $this->canEditMessages;
    }

    /**
     * Set administrators only. True, if the administrator can edit messages of other users, channels only.
     *
     * @param bool|null $canEditMessages Administrators only. True, if the administrator can edit messages of other users, channels only
     *
     * @return void
     */
    public function setCanEditMessages($canEditMessages)
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * Get administrators only. True, if the administrator can delete messages of other users.
     *
     * @return bool|null
     */
    public function getCanDeleteMessages()
    {
        return $this->canDeleteMessages;
    }

    /**
     * Set administrators only. True, if the administrator can delete messages of other users.
     *
     * @param bool|null $canDeleteMessages Administrators only. True, if the administrator can delete messages of other users
     *
     * @return void
     */
    public function setCanDeleteMessages($canDeleteMessages)
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * Get administrators only. True, if the administrator can invite new users to the chat.
     *
     * @return bool|null
     */
    public function getCanInviteUsers()
    {
        return $this->canInviteUsers;
    }

    /**
     * Set administrators only. True, if the administrator can invite new users to the chat.
     *
     * @param bool|null $canInviteUsers Administrators only. True, if the administrator can invite new users to the chat
     *
     * @return void
     */
    public function setCanInviteUsers($canInviteUsers)
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * Get administrators only. True, if the administrator can restrict, ban or unban chat members.
     *
     * @return bool|null
     */
    public function getCanRestrictMembers()
    {
        return $this->canRestrictMembers;
    }

    /**
     * Set administrators only. True, if the administrator can restrict, ban or unban chat members.
     *
     * @param bool|null $canRestrictMembers Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @return void
     */
    public function setCanRestrictMembers($canRestrictMembers)
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * Get administrators only. True, if the administrator can pin messages, supergroups only.
     *
     * @return bool|null
     */
    public function getCanPinMessages()
    {
        return $this->canPinMessages;
    }

    /**
     * Set administrators only. True, if the administrator can pin messages, supergroups only.
     *
     * @param bool|null $canPinMessages Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @return void
     */
    public function setCanPinMessages($canPinMessages)
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * Get (promoted by administrators that were appointed by the user).
     *
     * @return bool|null
     */
    public function getCanPromoteMembers()
    {
        return $this->canPromoteMembers;
    }

    /**
     * Set (promoted by administrators that were appointed by the user).
     *
     * @param bool|null $canPromoteMembers (promoted by administrators that were appointed by the user)
     *
     * @return void
     */
    public function setCanPromoteMembers($canPromoteMembers)
    {
        $this->canPromoteMembers = $canPromoteMembers;
    }

    /**
     * Get restricted only. True, if the user can send text messages, contacts, locations and venues.
     *
     * @return bool|null
     */
    public function getCanSendMessages()
    {
        return $this->canSendMessages;
    }

    /**
     * Set restricted only. True, if the user can send text messages, contacts, locations and venues.
     *
     * @param bool|null $canSendMessages Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @return void
     */
    public function setCanSendMessages($canSendMessages)
    {
        $this->canSendMessages = $canSendMessages;
    }

    /**
     * Get restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages.
     *
     * @return bool|null
     */
    public function getCanSendMediaMessages()
    {
        return $this->canSendMediaMessages;
    }

    /**
     * Set restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages.
     *
     * @param bool|null $canSendMediaMessages Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     *
     * @return void
     */
    public function setCanSendMediaMessages($canSendMediaMessages)
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
    }

    /**
     * Get restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages.
     *
     * @return bool|null
     */
    public function getCanSendOtherMessages()
    {
        return $this->canSendOtherMessages;
    }

    /**
     * Set restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages.
     *
     * @param bool|null $canSendOtherMessages Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages
     *
     * @return void
     */
    public function setCanSendOtherMessages($canSendOtherMessages)
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
    }

    /**
     * Get restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages.
     *
     * @return bool|null
     */
    public function getCanAddWebPagePreviews()
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * Set restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages.
     *
     * @param bool|null $canAddWebPagePreviews Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages
     *
     * @return void
     */
    public function setCanAddWebPagePreviews($canAddWebPagePreviews)
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
    }
}
