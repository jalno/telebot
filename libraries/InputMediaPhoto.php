<?php

namespace packages\telebot;

class InputMediaPhoto extends InputMedia
{
    public function __construct($media)
    {
        parent::__construct('photo', $media);
    }

    public static function fromJson($data)
    {
        $object = new self($data->media);
        if (isset($data->caption)) {
            $object->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $object->parseMode = $data->parse_mode;
        }

        return $object;
    }
}
