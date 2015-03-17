<?php
namespace HtmlWebFan\NoCaptcha;

class NoCaptcha
{

	private $scriptUrl = "";
	private $verifyUrl = "";
	private $secret = "";
	private $sitekey = "";
	private $response = "";
	private $remoteIP = "";

	public function __construct(Config $settings)
	{
		$this->setSiteKey($settings::SITE_KEY);
		$this->setSecret($settings::SECRET);
		$this->setVerifyUrl($settings::VERIFY_URL);
		$this->setScriptUrl($settings::SCRIPT_URL);
	}

	public function verify()
	{
		if (!$this->remoteIP) {
			$this->setRemoteIP($_SERVER["REMOTE_ADDR"]);
		}
		$ch = curl_init($this->getVerifyUrl() . "secret=" . $this->getSecret() . "&response=" . $this->getResponse() . "&remoteip=" . $this->getRemoteIP());

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		return json_decode(curl_exec($ch));

	}

	public function generateScriptTag($custom = array())
	{
		return "<script src='" . $this->getScriptUrl() . "'></script>";
	}

	public function generateField()
	{
		return "<div class='g-recaptcha' data-sitekey='" . $this->getSiteKey() . "'></div>";
	}

	public function setScriptUrl($vu)
	{
		$this->scriptUrl = $vu;
	}

	public function getScriptUrl()
	{
		return $this->scriptUrl;
	}

	public function setVerifyUrl($vu)
	{
		$this->verifyUrl = $vu;
	}

	public function getVerifyUrl()
	{
		return $this->verifyUrl;
	}

	public function setSiteKey($sk)
	{
		$this->sitekey = $sk;
	}

	public function getSiteKey()
	{
		return $this->sitekey;
	}

	public function setSecret($s)
	{
		$this->secret = $s;
	}

	public function getSecret()
	{
		return $this->secret;
	}

	public function setResponse($res)
	{
		$this->response = $res;
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function setRemoteIP($ip = '')
	{
		$this->remoteip = $ip;
	}

	public function getRemoteIP()
	{
		return $this->remoteip;
	}

	public function debug()
	{
		echo "<pre>";
		print_r($this);
		echo "</pre>";
		die();
	}

}
