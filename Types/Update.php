<?php
namespace packages\telebot;
use \packages\base\EventInterface;
class Update extends Type implements EventInterface {
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var Message|null
	 */
	protected $message;

	/**
	 * @var Message|null
	 */
	protected $editedMessage;

	/**
	 * @var Message|null
	 */
	protected $channelPost;

	/**
	 * @var Message|null
	 */
	protected $editedChannelPost;

	/**
	 * @var InlineQuery|null
	 */
	protected $inlineQuery;

	/**
	 * @var ChosenInlineResult|null
	 */
	protected $chosenInlineResult;

	/**
	 * @var CallbackQuery|null
	 */
	protected $callbackQuery;

	/**
	 * @var ShippingQuery|null
	 */
	protected $shippingQuery;

	/**
	 * @var PreCheckoutQuery|null
	 */
	protected $preCheckoutQuery;

	public function __construct(int $id){
		$this->id = $id;
	}
	public static function fromJson($data) {
		$object = new static($data->update_id);
		if (isset($data->message)) {
			$object->message = Message::fromJson($data->message);
		}
		if (isset($data->edited_message)) {
			$object->editedMessage = Message::fromJson($data->edited_message);
		}
		if (isset($data->channel_post)) {
			$object->channelPost = Message::fromJson($data->channel_post);
		}
		if (isset($data->edited_channel_post)) {
			$object->editedChannelPost = Message::fromJson($data->edited_channel_post);
		}
		if (isset($data->inline_query)) {
			$object->inlineQuery = InlineQuery::fromJson($data->inline_query);
		}
		if (isset($data->chosen_inline_result)) {
			$object->chosenInlineResult = ChosenInlineResult::fromJson($data->chosen_inline_result);
		}
		if (isset($data->callback_query)) {
			$object->callbackQuery = CallbackQuery::fromJson($data->callback_query);
		}
		if (isset($data->shipping_query)) {
			$object->shippingQuery = ShippingQuery::fromJson($data->shipping_query);
		}
		if (isset($data->pre_checkout_query)) {
			$object->preCheckoutQuery = PreCheckoutQuery::fromJson($data->pre_checkout_query);
		}
		return $object;
	}
	public function toJson() {
		return array(
			'id' => $this->id,
		);
	}

	/**
	 * Get the value of id
	 *
	 * @return  int
	 */ 
	public function getId(): int {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param  int  $id
	 * @return  void
	 */ 
	public function setId(int $id) {
		$this->id = $id;
	}

	/**
	 * Get the value of message
	 *
	 * @return  Message|null
	 */ 
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Set the value of message
	 *
	 * @param  Message|null  $message
	 * @return  void
	 */ 
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Get the value of editedMessage
	 *
	 * @return  Message|null
	 */ 
	public function getEditedMessage() {
		return $this->editedMessage;
	}

	/**
	 * Set the value of editedMessage
	 *
	 * @param  Message|null  $editedMessage
	 * @return  void
	 */ 
	public function setEditedMessage($editedMessage) {
		$this->editedMessage = $editedMessage;
	}

	/**
	 * Get the value of channelPost
	 *
	 * @return  Message|null
	 */ 
	public function getChannelPost() {
		return $this->channelPost;
	}

	/**
	 * Set the value of channelPost
	 *
	 * @param  Message|null  $channelPost
	 * @return  void
	 */ 
	public function setChannelPost($channelPost) {
		$this->channelPost = $channelPost;
	}

	/**
	 * Get the value of editedChannelPost
	 *
	 * @return  Message|null
	 */ 
	public function getEditedChannelPost() {
		return $this->editedChannelPost;
	}

	/**
	 * Set the value of editedChannelPost
	 *
	 * @param  Message|null  $editedChannelPost
	 * @return  void
	 */ 
	public function setEditedChannelPost($editedChannelPost) {
		$this->editedChannelPost = $editedChannelPost;
	}

	/**
	 * Get the value of inlineQuery
	 *
	 * @return  InlineQuery|null
	 */ 
	public function getInlineQuery() {
		return $this->inlineQuery;
	}

	/**
	 * Set the value of inlineQuery
	 *
	 * @param  InlineQuery|null  $inlineQuery
	 * @return  void
	 */ 
	public function setInlineQuery($inlineQuery) {
		$this->inlineQuery = $inlineQuery;
	}

	/**
	 * Get the value of chosenInlineResult
	 *
	 * @return  ChosenInlineResult|null
	 */ 
	public function getChosenInlineResult() {
		return $this->chosenInlineResult;
	}

	/**
	 * Set the value of chosenInlineResult
	 *
	 * @param  ChosenInlineResult|null  $chosenInlineResult
	 * @return  void
	 */ 
	public function setChosenInlineResult($chosenInlineResult) {
		$this->chosenInlineResult = $chosenInlineResult;
	}

	/**
	 * Get the value of callbackQuery
	 *
	 * @return  CallbackQuery|null
	 */ 
	public function getCallbackQuery() {
		return $this->callbackQuery;
	}

	/**
	 * Set the value of callbackQuery
	 *
	 * @param  CallbackQuery|null  $callbackQuery
	 * @return  void
	 */ 
	public function setCallbackQuery($callbackQuery) {
		$this->callbackQuery = $callbackQuery;
	}

	/**
	 * Get the value of shippingQuery
	 *
	 * @return  ShippingQuery|null
	 */ 
	public function getShippingQuery() {
		return $this->shippingQuery;
	}

	/**
	 * Set the value of shippingQuery
	 *
	 * @param  ShippingQuery|null  $shippingQuery
	 * @return  void
	 */ 
	public function setShippingQuery($shippingQuery) {
		$this->shippingQuery = $shippingQuery;
	}

	/**
	 * Get the value of preCheckoutQuery
	 *
	 * @return  PreCheckoutQuery|null
	 */ 
	public function getPreCheckoutQuery() {
		return $this->preCheckoutQuery;
	}

	/**
	 * Set the value of preCheckoutQuery
	 *
	 * @param  PreCheckoutQuery|null  $preCheckoutQuery
	 * @return  void
	 */ 
	public function setPreCheckoutQuery($preCheckoutQuery) {
		$this->preCheckoutQuery = $preCheckoutQuery;
	}
}