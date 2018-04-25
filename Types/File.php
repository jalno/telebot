<?php
namespace packages\telebot;
/**
 * This object represents a file ready to be downloaded.
 * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
 * It is guaranteed that the link will be valid for at least 1 hour.
 * When the link expires, a new one can be requested by calling getFile.
 *
 */
class File extends Type {
	/**
	 * Unique identifier for this file
	 * 
	 * @var int
	 */
	protected $fileId;

	/**
	 * File size, if known
	 * 
	 * @var int
	 */
	protected $fileSize;

	/**
	 * File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
	 * 
	 * @var string
	 */
	protected $filePath;

	public function __construct(int $fileId){
		$this->fileId = $fileId;
	}
	public static function fromJson($data) {
		$object = new static($data->file_id);
		if (isset($data->file_size)) {
			$object->fileSize = $data->file_size;
		}
		if (isset($data->file_path)) {
			$object->filePath = $data->file_path;
		}
		return $object;
	}
	public function toJson() {
		return array(
			'file_id' => $this->fileId,
			'file_size' => $this->fileSize,
			'file_path' => $this->filePath,
		);
	}
	
	/**
	 * Get file size, if known
	 *
	 * @return  int
	 */ 
	public function getFileSize(): int {
		return $this->fileSize;
	}

	/**
	 * Set file size, if known
	 *
	 * @param  int  $fileSize  File size, if known
	 * @return  void
	 */ 
	public function setFileSize(int $fileSize) {
		$this->fileSize = $fileSize;
	}

	/**
	 * Get unique identifier for this file
	 *
	 * @return  int
	 */ 
	public function getFileId(): int {
		return $this->fileId;
	}

	/**
	 * Set unique identifier for this file
	 *
	 * @param  int  $fileId  Unique identifier for this file
	 * @return  void
	 */ 
	public function setFileId(int $fileId) {
		$this->fileId = $fileId;
	}

	/**
	 * Get file path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
	 *
	 * @return  string
	 */ 
	public function getFilePath(): string {
		return $this->filePath;
	}

	/**
	 * Set file path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
	 *
	 * @param  string  $filePath  File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
	 * @return  void
	 */ 
	public function setFilePath(string $filePath) {
		$this->filePath = $filePath;
	}
}