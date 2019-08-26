<?php
namespace packages\telebot;
class AnswerCallbackQuery extends Method {

	protected $callbackQueryId;

	/**
     * @var string
     */
	protected $text;

	/**
     * @var bool
     */
	protected $showAlert = false;

	public function __construct($callbackQueryId, string $text) {
		$this->callbackQueryId = $callbackQueryId;
		$this->text = $text;
	}
	
	public function toJson(): array {
		return array(
			'callback_query_id' => $this->callbackQueryId,
			'text' => $this->text,
			'show_alert' => $this->showAlert,
		);
	}
	/**
	 * @return bool
	 */
	public function handleResponse($response) {
		return $response;
	}
}