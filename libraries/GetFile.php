<?php
namespace packages\telebot;
class GetFile extends Method {
	/**
     * @var int
     */
	protected $fileId;

	public function __construct(int $fileId) {
		$this->fileId = $fileId;
	}
	
	/**
	 * Get the value of fileId
	 *
	 * @return  int
	 */ 
	public function getFileId(): int {
		return $this->fileId;
	}

	/**
	 * Set the value of fileId
	 *
	 * @param  int  $fileId
	 * @return  void
	 */ 
	public function setFileId(int $fileId) {
		$this->fileId = $fileId;
	}
	
	public function toJson(): array {
		return array(
			'file_id' => $this->fileId,
		);
	}
	public function handleResponse($response) {
		return File::fromJson($response);
	}

}