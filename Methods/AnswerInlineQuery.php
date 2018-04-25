<?php
namespace packages\telebot;
class AnswerInlineQuery extends Method {
	/**
     * @var int
     */
	protected $inlineQueryId;

	/**
     * @var AbstractInlineQueryResult[]
     */
	protected $results;
	
	/**
     * @var int
     */
	protected $cacheTime = 300;
	
	/**
     * @var bool
     */
	protected $isPersonal = false;

	/**
     * @var string
     */
	protected $nextOffset = '';

	/**
     * @var string|null
     */
	protected $switchPmParameter;

	/**
     * @var string|null
     */
	protected $switchPmText;


	public function __construnt(int $inlineQueryId, array $results) {
		$this->inlineQueryId = $inlineQueryId;
		$this->results = $results;
	}
	
	


	/**
	 * Get the value of inlineQueryId
	 *
	 * @return  int
	 */ 
	public function getInlineQueryId(): int {
		return $this->inlineQueryId;
	}

	/**
	 * Set the value of inlineQueryId
	 *
	 * @param  int  $inlineQueryId
	 * @return  void
	 */ 
	public function setInlineQueryId(int $inlineQueryId) {
		$this->inlineQueryId = $inlineQueryId;
	}

	/**
	 * Get the value of results
	 *
	 * @return  AbstractInlineQueryResult[]
	 */ 
	public function getResults(): array {
		return $this->results;
	}

	/**
	 * Set the value of results
	 *
	 * @param  AbstractInlineQueryResult[]  $results
	 * @return  void
	 */ 
	public function setResults(array $results) {
		$this->results = $results;
	}

	/**
	 * Get the value of cacheTime
	 *
	 * @return  int
	 */ 
	public function getCacheTime(): int {
		return $this->cacheTime;
	}

	/**
	 * Set the value of cacheTime
	 *
	 * @param  int  $cacheTime
	 * @return  void
	 */ 
	public function setCacheTime(int $cacheTime) {
		$this->cacheTime = $cacheTime;
	}

	/**
	 * Get the value of isPersonal
	 *
	 * @return  bool
	 */ 
	public function getIsPersonal(): bool {
		return $this->isPersonal;
	}

	/**
	 * Set the value of isPersonal
	 *
	 * @param  bool  $isPersonal
	 * @return  void
	 */ 
	public function setIsPersonal(bool $isPersonal) {
		$this->isPersonal = $isPersonal;
	}

	/**
	 * Get the value of nextOffset
	 *
	 * @return  string
	 */ 
	public function getNextOffset(): string {
		return $this->nextOffset;
	}

	/**
	 * Set the value of nextOffset
	 *
	 * @param  string  $nextOffset
	 * @return  void
	 */ 
	public function setNextOffset(string $nextOffset) {
		$this->nextOffset = $nextOffset;
	}

	/**
	 * Get the value of switchPmParameter
	 *
	 * @return  string|null
	 */ 
	public function getSwitchPmParameter() {
		return $this->switchPmParameter;
	}

	/**
	 * Set the value of switchPmParameter
	 *
	 * @param  string|null  $switchPmParameter
	 * @return  void
	 */ 
	public function setSwitchPmParameter($switchPmParameter) {
		$this->switchPmParameter = $switchPmParameter;
	}

	/**
	 * Get the value of switchPmText
	 *
	 * @return  string|null
	 */ 
	public function getSwitchPmText() {
		return $this->switchPmText;
	}

	/**
	 * Set the value of switchPmText
	 *
	 * @param  string|null  $switchPmText
	 * @return  void
	 */ 
	public function setSwitchPmText($switchPmText) {
		$this->switchPmText = $switchPmText;
	}
	
	public function toJson(): array {
		$results = [];
		foreach($this->results as $result) {
			$results[] = $result;
		}
		return array(
			'inline_query_id' => $this->inlineQueryId,
            'results' => $this->results,
            'cache_time' => $this->cacheTime,
            'is_personal' => $this->isPersonal,
            'next_offset' => $this->nextOffset,
            'switch_pm_text' => $this->switchPmText,
            'switch_pm_parameter' => $this->switchPmParameter,
		);
	}
	public function handleResponse($response) {
		return $response;
	}
}