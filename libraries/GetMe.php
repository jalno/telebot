<?php

namespace packages\telebot;

class GetMe extends Method
{
    public function toJson(): array
    {
        return [];
    }

    public function handleResponse($response)
    {
        return User::fromJson($response);
    }
}
