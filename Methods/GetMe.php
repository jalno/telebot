<?php
namespace packages\telebot;
class GetMe extends Method {
	public function toJson(): array {
		return array();
	}
	public function handleResponse($response) {
		return User::fromJson($response);
	}
}