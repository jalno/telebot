<?php

namespace packages\telebot;

class ReplyKeyboardRemove extends Type
{
    /**
     * @var bool
     */
    protected $removeKeyboard;

    /**
     * @var bool
     */
    protected $selective;

    public function __construct(bool $removeKeyboard)
    {
        $this->removeKeyboard = $removeKeyboard;
    }

    public static function fromJson($data)
    {
        $object = new self($data->remove_keyboard);
        if (isset($data->selective)) {
            $object->selective = $data->selective;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'remove_keyboard' => $this->removeKeyboard,
            'selective' => $this->selective,
        ];
    }

    /**
     * Get the value of removeKeyboard.
     */
    public function getRemoveKeyboard(): bool
    {
        return $this->removeKeyboard;
    }

    /**
     * Set the value of removeKeyboard.
     *
     * @return void
     */
    public function setRemoveKeyboard(bool $removeKeyboard)
    {
        $this->removeKeyboard = $removeKeyboard;
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
