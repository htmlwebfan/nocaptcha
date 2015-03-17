<?php
namespace HtmlWebFan\NoCaptcha;

use HtmlWebFan\NoCaptcha\NoCaptcha as NoCaptcha;
use HtmlWebFan\NoCaptcha\Config as Config;

require_once('../vendor/autoload.php');

$r = $_POST['g-recaptcha-response'];
$em = $_POST['email'];

$nobot = new NoCaptcha(new Config);
$nobot->setResponse($r);

$v = $nobot->verify();

echo"<pre>";
print_r($_POST);
print_r($v);
echo"</pre>";
die();
