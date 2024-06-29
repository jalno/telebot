<?php

namespace packages\telebot;

class Contact extends Type
{
    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string|null
     */
    protected $lastName;

    /**
     * @var int|null
     */
    protected $userId;
    /**
     * @var string
     */
    protected $fileName;

    public function __construct(string $phoneNumber, string $firstName)
    {
        $this->phoneNumber = $phoneNumber;
        $this->firstName = $firstName;
    }

    public static function fromJson($data)
    {
        $object = new self($data->phone_number, $data->first_name);
        if (isset($data->last_name)) {
            $object->lastName = $data->last_name;
        }
        if (isset($data->file_name)) {
            $object->fileName = $data->file_name;
        }
        if (isset($data->user_id)) {
            $object->userId = $data->user_id;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'phone_number' => $this->phoneNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'file_name' => $this->fileName,
            'user_id' => $this->userId,
        ];
    }

    /**
     * Get the value of phoneNumber.
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber.
     *
     * @return void
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Get the value of firstName.
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName.
     *
     * @return void
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get the value of lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName.
     *
     * @param string|null $lastName
     *
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get the value of userId.
     *
     * @return int|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId.
     *
     * @param int|null $userId
     *
     * @return void
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
