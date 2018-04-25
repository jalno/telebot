<?php
namespace packages\telebot;
/**
 * Class Document
 * This object represents a general file (as opposed to photos and audio files).
 * Telegram users can send files of any type of up to 1.5 GB in size.
 */
class Document extends Type {
	/**
	 * @var string
	 */
	protected $fileId;

	/**
	 * @var string|null
	 */
	protected $fileName;

	/**
	 * @var PhotoSize|null
	 */
	protected $thumb;

	/**
	 * @var string|null
	 */
	protected $mimeType;

	/**
	 * @var int|null
	 */
	protected $fileSize;


	public function __construct(string $fileId){
		$this->fileId = $fileId;
	}
	public static function fromJson($data) {
		$object = new static($data->file_id);
		if (isset($data->thumb)) {
			$object->thumb = PhotoSize::fromJson($data->thumb);
		}
		if (isset($data->file_name)) {
			$object->fileName = $data->file_name;
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
			'file_name' => $this->fileName,
			'mime_type' => $this->mimeType,
			'file_size' => $this->fileSize,
			'thumb' => $data->thumb ? $data->thumb->toJson() : null,
		);
	}
	

	/**
	 * Get the value of fileSize
	 *
	 * @return  int|null
	 */ 
	public function getFileSize() {
		return $this->fileSize;
	}

	/**
	 * Set the value of fileSize
	 *
	 * @param  int|null  $fileSize
	 * @return  void
	 */ 
	public function setFileSize($fileSize) {
		$this->fileSize = $fileSize;
	}

	/**
	 * Get the value of mimeType
	 *
	 * @return  string|null
	 */ 
	public function getMimeType() {
		return $this->mimeType;
	}

	/**
	 * Set the value of mimeType
	 *
	 * @param  string|null  $mimeType
	 * @return  void
	 */ 
	public function setMimeType($mimeType) {
		$this->mimeType = $mimeType;
	}

	/**
	 * Get the value of thumb
	 *
	 * @return  PhotoSize|null
	 */ 
	public function getThumb() {
		return $this->thumb;
	}

	/**
	 * Set the value of thumb
	 *
	 * @param  PhotoSize|null  $thumb
	 * @return  void
	 */ 
	public function setThumb($thumb) {
		$this->thumb = $thumb;
	}

	/**
	 * Get the value of fileName
	 *
	 * @return  string|null
	 */ 
	public function getFileName() {
		return $this->fileName;
	}

	/**
	 * Set the value of fileName
	 *
	 * @param  string|null  $fileName
	 * @return  void
	 */ 
	public function setFileName($fileName) {
		$this->fileName = $fileName;
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
}