<?php
namespace packages\telebot;
abstract class Method {
	abstract public function toJson(): array;
	abstract public function handleResponse($response);
}