<?php
namespace packages\telebot;
class ReplyKeyboardMarkup extends Type {
	/**
	 * @var KeyboardButton[][]
	 */
	protected $keyboard;

	/**
	 * @var bool
	 */
	protected $oneTimeKeyboard;

	/**
	 * @var bool
	 */
	protected $resizeKeyboard = false;

	/**
	 * @var bool
	 */
	protected $selective;

	public function __construct(array $keyboard){
		$this->keyboard = $keyboard;
	}
	public static function fromJson($data) {
		$object = new self($data->keyboard);
		if (isset($data->one_time_keyboard)) {
			$object->oneTimeKeyboard = $data->one_time_keyboard;
		}
		if (isset($data->resize_keyboard)) {
			$object->resizeKeyboard = $data->resize_keyboard;
		}
		if (isset($data->selective)) {
			$object->selective = $data->selective;
		}
		return $object;
	}
	public function toJson() {
		$keyboard = [];
		foreach($this->keyboard as $row){
			$newRow = [];
			foreach($row as $btn) {
				$newRow[] = $btn->toJson();
			}
			$keyboard[] = $newRow;
		}
		$json = array(
			'keyboard' => $keyboard
		);
		if ($this->oneTimeKeyboard) {
			$json['one_time_keyboard'] = $this->oneTimeKeyboard;
		}
		if ($this->resizeKeyboard) {
			$json['resize_keyboard'] = $this->resizeKeyboard;
		}
		if ($this->selective) {
			$json['selective'] = $this->selective;
		}
		return $json;
	}

	/**
	 * Get the value of selective
	 *
	 * @return  bool
	 */ 
	public function getSelective(): bool {
		return $this->selective;
	}

	/**
	 * Set the value of selective
	 *
	 * @param  bool  $selective
	 * @return  void
	 */ 
	public function setSelective(bool $selective) {
		$this->selective = $selective;
	}

	/**
	 * Get the value of keyboard
	 *
	 * @return  array
	 */ 
	public function getKeyboard(): array {
		return $this->keyboard;
	}

	/**
	 * Set the value of keyboard
	 *
	 * @param  array  $keyboard
	 * @return  void
	 */ 
	public function setKeyboard(array $keyboard) {
		$this->keyboard = $keyboard;
	}

	/**
	 * Get the value of oneTimeKeyboard
	 *
	 * @return  bool
	 */ 
	public function getOneTimeKeyboard(): bool {
		return $this->oneTimeKeyboard;
	}

	/**
	 * Set the value of oneTimeKeyboard
	 *
	 * @param  bool  $oneTimeKeyboard
	 * @return  void
	 */ 
	public function setOneTimeKeyboard(bool $oneTimeKeyboard) {
		$this->oneTimeKeyboard = $oneTimeKeyboard;
	}

	/**
	 * Get the value of resizeKeyboard
	 *
	 * @return  bool
	 */ 
	public function getResizeKeyboard(): bool {
		return $this->resizeKeyboard;
	}

	/**
	 * Set the value of resizeKeyboard
	 *
	 * @param  bool  $resizeKeyboard
	 * @return  void
	 */ 
	public function setResizeKeyboard(bool $resizeKeyboard) {
		$this->resizeKeyboard = $resizeKeyboard;
	}
}