<?php
namespace packages\telebot\Processes;
use \packages\base\{process, log, events, options};
use packages\telebot\API;
use \Exception;
class GetUpdates extends process {
	public function check() {
		$log = log::getInstance();
		$log->debug("get default token from options");
		$token = options::get('packages.telebot.updater.default-token');
		if (!$token) {
			$log->reply()->fatal("notfound");
			throw new Exception("cannot find 'packages.telebot.updater.default-token' option");
		}
		$log->reply("Found");
		$log->debug("get long-polling timeout from options");
		$timeout = options::get('packages.telebot.updater.timeout');
		if ($timeout === false or $timeout === null) {
			$log->reply("notfound, set it to 60 seconds");
			$timeout = 60;
		}
		$log->reply($timeout, "seconds");
		
		$bot = new API($token);
		$updates = $bot->getUpdate(null, 100, $timeout);
		foreach($updates as $update) {
			$update->setBot($bot);
			events::trigger($update);
		}
	}
	public function loop() {
		while(1) {
			$this->check();
		}
	}
}