<?php
namespace packages\telebot;
class UserProfilePhotos extends Type {
	/**
	 * @var int
	 */
	protected $totalCount;

	/**
	 * @var PhotoSize[]
	 */
	protected $photos;

	public function __construct(int $totalCount, array $photos){
		$this->totalCount = $totalCount;
		$this->photos = $photos;
	}
	public static function fromJson($data) {
		$photos = [];
		foreach($data->photos as $photo) {
			$photos[] = PhotoSize::fromJson($photo);
		}
		return new self($data->total_count, $photos);
	}
	public function toJson() {
		$photos = [];
		foreach($this->photos as $photo) {
			$photos[] = $photo->toJson();
		}
		return array(
			'total_count' => $this->totalCount,
			'photos' => $photos,
		);
	}
	
	/**
	 * Get the value of totalCount
	 *
	 * @return  int
	 */ 
	public function getTotalCount(): int {
		return $this->totalCount;
	}

	/**
	 * Set the value of totalCount
	 *
	 * @param  int  $totalCount
	 * @return  void
	 */ 
	public function setTotalCount(int $totalCount) {
		$this->totalCount = $totalCount;
	}

	/**
	 * Get the value of photos
	 *
	 * @return  PhotoSize[]
	 */ 
	public function getPhotos(): array {
		return $this->photos;
	}

	/**
	 * Set the value of photos
	 *
	 * @param  PhotoSize[]  $photos
	 * @return  void
	 */ 
	public function setPhotos(array $photos) {
		$this->photos = $photos;
	}
}