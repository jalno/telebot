<?php
namespace packages\telebot;
/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 */
class InlineKeyboardButton extends Type {
	/**
	 * Label text on the button
	 * 
	 * @var string
	 */
	protected $text;
	
	/**
	 * HTTP url to be opened when button is pressed
	 * 
	 * @var string|null
	 */
	protected $url;

	/**
	 * Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
	 * 
	 * @var string|null
	 */
	protected $callbackData;

	/**
	 * If set, pressing the button will prompt the user to select one of their chats, open that
	 * chat and insert the bot‘s username and the specified inline query in the input field. 
	 * Can be empty, in which case just the bot’s username will be inserted.
	 * 
	 * @var string|null
	 */
	protected $switchInlineQuery;

	/**
	 * If set, pressing the button will insert the bot‘s username and the specified inline query in
	 * the current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
	 * This offers a quick way for the user to open your bot in inline mode in the same chat – good for 
	 * selecting something from multiple options.
	 * 
	 * @var string|null
	 */
	protected $switchInlineQueryCurrentChat;

	/**
	 * Description of the game that will be launched when the user presses the button.
	 * 
	 * @var CallbackGame|null
	 */
	protected $callbackGame;


	/**
	 * Specify True, to send a Pay button.
	 * 
	 * @var bool
	 */
	protected $pay = false;

	public function __construct(string $text){
		$this->text = $text;
	}
	public static function fromJson($data) {
		$object = new self($data->text);
		if (isset($data->url)) {
			$object->url = $data->url;
		}
		if (isset($data->callback_data)) {
			$object->callbackData = $data->callback_data;
		}
		if (isset($data->switch_inline_query)) {
			$object->switchInlineQuery = $data->switch_inline_query;
		}
		if (isset($data->switch_inline_query_current_chat)) {
			$object->switchInlineQueryCurrentChat = $data->switch_inline_query_current_chat;
		}
		if (isset($data->callback_game)) {
			$object->callbackGame = CallbackGame::fromJson($data->callback_game);
		}
		return $object;
	}
	public function toJson() {
		$data = array(
			'text' => $this->text,
		);
		if ($this->url) {
			$data['url'] = $this->url;
		}
		if ($this->callbackData) {
			$data['callback_data'] = $this->callbackData;
		}
		if ($this->switchInlineQuery) {
			$data['switch_inline_query'] = $this->switchInlineQuery;
		}
		if ($this->switchInlineQueryCurrentChat) {
			$data['switch_inline_query_current_chat'] = $this->switchInlineQueryCurrentChat;
		}
		if ($this->callbackGame) {
			$data['callback_game'] = $this->callbackGame->toJson();
		}
		return $data;
	}

	/**
	 * Get label text on the button
	 *
	 * @return  string
	 */ 
	public function getText(): string {
		return $this->text;
	}

	/**
	 * Set label text on the button
	 *
	 * @param  string  $text  Label text on the button
	 * @return  void
	 */ 
	public function setText(string $text) {
		$this->text = $text;
	}

	/**
	 * Get hTTP url to be opened when button is pressed
	 *
	 * @return  string|null
	 */ 
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Set hTTP url to be opened when button is pressed
	 *
	 * @param  string|null  $url  HTTP url to be opened when button is pressed
	 * @return  void
	 */ 
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Get data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
	 *
	 * @return  string|null
	 */ 
	public function getCallbackData() {
		return $this->callbackData;
	}

	/**
	 * Set data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
	 *
	 * @param  string|null  $callbackData  Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
	 * @return  void
	 */ 
	public function setCallbackData($callbackData) {
		$this->callbackData = $callbackData;
	}

	/**
	 * Get can be empty, in which case just the bot’s username will be inserted.
	 *
	 * @return  string|null
	 */ 
	public function getSwitchInlineQuery() {
		return $this->switchInlineQuery;
	}

	/**
	 * Set can be empty, in which case just the bot’s username will be inserted.
	 *
	 * @param  string|null  $switchInlineQuery  Can be empty, in which case just the bot’s username will be inserted.
	 * @return  void
	 */ 
	public function setSwitchInlineQuery($switchInlineQuery) {
		$this->switchInlineQuery = $switchInlineQuery;
	}

	/**
	 * Get selecting something from multiple options.
	 *
	 * @return  string|null
	 */ 
	public function getSwitchInlineQueryCurrentChat() {
		return $this->switchInlineQueryCurrentChat;
	}

	/**
	 * Set selecting something from multiple options.
	 *
	 * @param  string|null  $switchInlineQueryCurrentChat  selecting something from multiple options.
	 * @return  void
	 */ 
	public function setSwitchInlineQueryCurrentChat($switchInlineQueryCurrentChat) {
		$this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
	}

	/**
	 * Get description of the game that will be launched when the user presses the button.
	 *
	 * @return  CallbackGame|null
	 */ 
	public function getCallbackGame() {
		return $this->callbackGame;
	}

	/**
	 * Set description of the game that will be launched when the user presses the button.
	 *
	 * @param  CallbackGame|null  $callbackGame  Description of the game that will be launched when the user presses the button.
	 * @return  void
	 */ 
	public function setCallbackGame($callbackGame) {
		$this->callbackGame = $callbackGame;
	}

	/**
	 * Get specify True, to send a Pay button.
	 *
	 * @return  bool
	 */ 
	public function getPay(): bool{
		return $this->pay;
	}

	/**
	 * Set specify True, to send a Pay button.
	 *
	 * @param  bool  $pay  Specify True, to send a Pay button.
	 * @return  void
	 */ 
	public function setPay(bool $pay) {
		$this->pay = $pay;
	}
}