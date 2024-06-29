<?php
namespace packages\telebot\Processes;
use \packages\base\{Process, Log, Events, Options};
use packages\telebot\API;
use \Exception;
class GetUpdates extends process {
	public function check() {
		$log = Log::getInstance();
		$log->debug("get default token from options");
		$token = Options::get('packages.telebot.updater.default-token');
		if (!$token) {
			$log->reply()->fatal("notfound");
			throw new Exception("cannot find 'packages.telebot.updater.default-token' option");
		}
		$log->reply("Found");
		$log->debug("get long-polling timeout from options");
		$timeout = Options::get('packages.telebot.updater.timeout');
		if ($timeout === false or $timeout === null) {
			$log->reply("notfound, set it to 60 seconds");
			$timeout = 60;
		}
		$log->reply($timeout, "seconds");
		
		$bot = new API($token);
		$updates = $bot->getUpdate(null, 100, $timeout);
		foreach($updates as $update) {
			$update->setBot($bot);
			Events::trigger($update);
		}
	}
	public function loop() {
		while(1) {
			$this->check();
		}
	}
}