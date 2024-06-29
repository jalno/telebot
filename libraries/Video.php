<?php
namespace packages\telebot;
class Video extends Type {
	/**
	 * @var string
	 */
	protected $fileId;

	/**
	 * @var int
	 */
	protected $width;

	/**
	 * @var string
	 */
	protected $height;

	/**
	 * @var int
	 */
	protected $duration;

	/**
	 * @var PhotoSize
	 */
	protected $thumb;

	/**
	 * @var string
	 */
	protected $mimeType;

	/**
	 * @var int
	 */
	protected $fileSize;


	public function __construct(string $fileId, int $width, int $height, int $duration){
		$this->fileId = $fileId;
		$this->width = $width;
		$this->height = $height;
		$this->duration = $duration;
	}
	public static function fromJson($data) {
		$object = new self($data->file_id, $data->width, $data->height, $data->duration);
		if (isset($data->thumb)) {
			$object->thumb = PhotoSize::fromJson($data->thumb);
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
			'width' => $this->width,
			'height' => $this->height,
			'duration' => $this->duration,
			'mime_type' => $this->mimeType,
			'file_size' => $this->fileSize,
		);
	}


	/**
	 * Get the value of fileId
	 *
	 * @return  string
	 */ 
	public function getFileId(): string {
		return $this->fileId;
	}

	/**
	 * Set the value of fileId
	 *
	 * @param  string  $fileId
	 * @return  void
	 */ 
	public function setFileId(string $fileId) {
		$this->fileId = $fileId;
	}

	/**
	 * Get the value of width
	 *
	 * @return  int
	 */ 
	public function getWidth(): int {
		return $this->width;
	}

	/**
	 * Set the value of width
	 *
	 * @param  int  $width
	 * @return  void
	 */ 
	public function setWidth(int $width) {
		$this->width = $width;
	}

	/**
	 * Get the value of height
	 *
	 * @return  string
	 */ 
	public function getHeight(): string {
		return $this->height;
	}

	/**
	 * Set the value of height
	 *
	 * @param  string  $height
	 * @return  void
	 */ 
	public function setHeight(string $height) {
		$this->height = $height;
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
	 * Get the value of thumb
	 *
	 * @return  PhotoSize
	 */ 
	public function getThumb(): PhotoSize {
		return $this->thumb;
	}

	/**
	 * Set the value of thumb
	 *
	 * @param  PhotoSize  $thumb
	 * @return  void
	 */ 
	public function setThumb(PhotoSize $thumb) {
		$this->thumb = $thumb;
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