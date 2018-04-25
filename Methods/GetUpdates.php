<?php
namespace packages\telebot;
class GetUpdates extends Method {
	/**
     * @var int 
     */
	protected $offset;

	/**
     * @var int
     */
	protected $limit;

	/**
     * @var int
     */
	protected $timeout;

	/**
	 * @param int $offset
	 * @param int $limit
	 * @param int $timeout
	 */
	public function __construct(int $offset = 0, int $limit = 100, int $timeout = 0) {
		$this->offset = $offset;
		$this->limit = $limit;
		$this->timeout = $timeout;
	}
	
	/**
	 * Get the value of offset
	 *
	 * @return  int
	 */ 
	public function getOffset(): int {
		return $this->offset;
	}

	/**
	 * Set the value of offset
	 *
	 * @param  int  $offset
	 * @return  void
	 */ 
	public function setOffset(int $offset) {
		$this->offset = $offset;
	}

	/**
	 * Get the value of limit
	 *
	 * @return  int
	 */ 
	public function getLimit(): int {
		return $this->limit;
	}

	/**
	 * Set the value of limit
	 *
	 * @param  int  $limit
	 * @return  void
	 */ 
	public function setLimit(int $limit) {
		$this->limit = $limit;
	}

	/**
	 * Get the value of timeout
	 *
	 * @return  int
	 */ 
	public function getTimeout(): int {
		return $this->timeout;
	}

	/**
	 * Set the value of timeout
	 *
	 * @param  int  $timeout
	 * @return  void
	 */ 
	public function setTimeout(int $timeout) {
		$this->timeout = $timeout;
	}

	public function toJson(): array {
		return array(
			'offset' => $this->offset,
            'limit' => $this->limit,
            'timeout' => $this->timeout,
		);
	}
	public function handleResponse($response) {
		$updates = [];
		foreach($response as $item) {
			$updates[] = Update::fromJson($item);
		}
		return $updates;
	}
}