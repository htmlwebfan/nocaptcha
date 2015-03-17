<?php
namespace HtmlWebFan\NoCaptcha;

use HtmlWebFan\NoCaptcha\NoCaptcha as NoCaptcha;
use HtmlWebFan\NoCaptcha\Config as Config;

require_once('../vendor/autoload.php');

$nb = new NoCaptcha(new Config);

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Test Page</title>
	<?php echo $nb->generateScriptTag(); ?>
</head>
<body>

<form method="post" action="processor.php">
	<label for="email">Email:</label>
	<input type="email" value="" id="email" name="email"/>
	<?php echo $nb->generateField(); ?>
	<input type="submit" value="Submit" />
</form>

</body>
</html>
