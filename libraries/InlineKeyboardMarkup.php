<?php

namespace packages\telebot;

class InlineKeyboardMarkup extends Type
{
    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     * Array of Array of InlineKeyboardButton.
     *
     * @var InlineKeyboardButton[][]
     */
    protected $inlineKeyboard;

    public function __construct(array $inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    public static function fromJson($data)
    {
        $keyboard = [];
        foreach ($data->inline_keyboard as $row) {
            $newRow = [];
            foreach ($row as $button) {
                $newRow[] = InlineKeyboardButton::fromJson($button);
            }
            $keyboard[] = $newRow;
        }

        return new self($keyboard);
    }

    public function toJson()
    {
        $keyboard = [];
        foreach ($this->inlineKeyboard as $row) {
            $newRow = [];
            foreach ($row as $button) {
                $newRow[] = $button->toJson();
            }
            $keyboard[] = $newRow;
        }

        return [
            'inline_keyboard' => $keyboard,
        ];
    }

    /**
     * Get array of Array of InlineKeyboardButton.
     *
     * @return InlineKeyboardButton[][]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

    /**
     * Set array of Array of InlineKeyboardButton.
     *
     * @param InlineKeyboardButton[][] $inlineKeyboard Array of Array of InlineKeyboardButton
     *
     * @return void
     */
    public function setInlineKeyboard(array $inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }
}
