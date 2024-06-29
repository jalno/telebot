<?php

namespace packages\telebot;

class ReplyKeyboardHide extends Type
{
    /**
     * @var bool
     */
    protected $hideKeyboard;

    /**
     * @var bool
     */
    protected $selective = false;

    public function __construct(bool $hideKeyboard = true)
    {
        $this->hideKeyboard = $hideKeyboard;
    }

    public static function fromJson($data)
    {
        $object = new self($data->hide_keyboard);
        if (isset($data->selective)) {
            $object->selective = $data->selective;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'hide_keyboard' => $this->hideKeyboard,
            'selective' => $this->selective,
        ];
    }

    /**
     * Get the value of hideKeyboard.
     */
    public function getHideKeyboard(): bool
    {
        return $this->hideKeyboard;
    }

    /**
     * Set the value of hideKeyboard.
     *
     * @return void
     */
    public function setHideKeyboard(bool $hideKeyboard)
    {
        $this->hideKeyboard = $hideKeyboard;
    }

    /**
     * Get the value of selective.
     */
    public function getSelective(): bool
    {
        return $this->selective;
    }

    /**
     * Set the value of selective.
     *
     * @return void
     */
    public function setSelective(bool $selective)
    {
        $this->selective = $selective;
    }
}
