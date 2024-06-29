<?php
namespace packages\telebot;
use packages\base\IO\File;
class SetWebhook extends Method {
	/**
     * @var string 
     */
	protected $url;

	/**
     * @var File
     */
	protected $certificate;

	/**
	 * @param string $url HTTPS url to send updates to. Use an empty string to remove webhook integration
	 * @param File $certificate Upload your public key certificate so that the root certificate in use can be checked
	 */
	public function __construct(string $url, File $certificate = null) {
		$this->url = $url;
		$this->certificate = $certificate;
	}
	
	/**
	 * Get the value of url
	 *
	 * @return  string
	 */ 
	public function getUrl(): string {
		return $this->url;
	}

	/**
	 * Set the value of url
	 *
	 * @param  string  $url
	 * @return  void
	 */ 
	public function setUrl(string $url) {
		$this->url = $url;
	}

	/**
	 * Get the value of certificate
	 *
	 * @return  File
	 */ 
	public function getCertificate(): File {
		return $this->certificate;
	}

	/**
	 * Set the value of certificate
	 *
	 * @param  File  $certificate
	 * @return  void
	 */ 
	public function setCertificate(File $certificate) {
		$this->certificate = $certificate;
	}

	public function toJson(): array {
		return array(
			'url' => $this->url,
            'certificate' => $this->certificate,
		);
	}
	public function handleResponse($response) {
		return $response;
	}
}