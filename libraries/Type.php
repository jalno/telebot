<?php

namespace packages\telebot;

abstract class Type
{
    /**
     * @var API|null
     */
    protected $bot;

    abstract public static function fromJson($data);

    abstract public function toJson();

    /**
     * Get the value of bot.
     *
     * @return API|null
     */
    public function getBot()
    {
        return $this->bot;
    }

    /**
     * Set the value of bot.
     *
     * @param API|null $bot
     *
     * @return void
     */
    public function setBot($bot)
    {
        $this->bot = $bot;
    }
}
