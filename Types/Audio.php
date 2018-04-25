<?php
namespace packages\telebot;
class Audio extends Type {
	/**
	 * @var int
	 */
	protected $fileId;

	/**
	 * @var int
	 */
	protected $duration;

	/**
	 * @var string|null
	 */
	protected $performer;

	/**
	 * @var string|null
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $mimeType;

	/**
	 * @var int
	 */
	protected $fileSize;


	public function __construct(int $fileId, int $duration){
		$this->fileId = $fileId;
		$this->duration = $duration;
	}
	public static function fromJson($data) {
		$object = new static($data->file_id, $data->duration);
		if (isset($data->performer)) {
			$object->performer = $data->performer;
		}
		if (isset($data->title)) {
			$object->title = $data->title;
		}
		if (isset($data->mime_type)) {
			$object->mimeType = $data->mime_type;
		}
		if (isset($data->file_size)) {
			$object->fileSize = $data->file_size;
		}
		return $object;
	}
	public function toJson() {
		return array(
			'file_id' => $this->fileId,
			'duration' => $this->duration,
			'performer' => $this->performer,
			'title' => $this->title,
			'mime_type' => $this->mimeType,
			'file_size' => $this->fileSize,
			'thumb' => $data->thumb ? $data->thumb->toJson() : null,
		);
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
	

	/**
	 * Get the value of duration
	 *
	 * @return  int
	 */ 
	public function getDuration(): int {
		return $this->duration;
	}

	/**
	 * Set the value of duration
	 *
	 * @param  int  $duration
	 * @return  void
	 */ 
	public function setDuration(int $duration) {
		$this->duration = $duration;
	}

	/**
	 * Get the value of performer
	 *
	 * @return  string|null
	 */ 
	public function getPerformer() {
		return $this->performer;
	}

	/**
	 * Set the value of performer
	 *
	 * @param  string|null  $performer
	 * @return  void
	 */ 
	public function setPerformer($performer) {
		$this->performer = $performer;
	}

	/**
	 * Get the value of title
	 *
	 * @return  string|null
	 */ 
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param  string|null  $title
	 * @return  void
	 */ 
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Get the value of mimeType
	 *
	 * @return  string
	 */ 
	public function getMimeType(): string {
		return $this->mimeType;
	}

	/**
	 * Set the value of mimeType
	 *
	 * @param  string  $mimeType
	 * @return  void
	 */ 
	public function setMimeType(string $mimeType) {
		$this->mimeType = $mimeType;
	}

	/**
	 * Get the value of fileSize
	 *
	 * @return  int
	 */ 
	public function getFileSize(): int {
		return $this->fileSize;
	}

	/**
	 * Set the value of fileSize
	 *
	 * @param  int  $fileSize
	 * @return  void
	 */ 
	public function setFileSize(int $fileSize) {
		$this->fileSize = $fileSize;
	}
}