# nocaptcha

[![Latest Version](https://img.shields.io/github/release/htmlwebfan/nocaptcha.svg?style=flat-square)](https://github.com/htmlwebfan/nocaptcha/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/league/nocaptcha.svg?style=flat-square)](https://packagist.org/packages/htmlwebfan/nocaptcha)

Are you a robot? Introducing "No Captcha reCaptcha".

This PHP package allows you to render a form field in a form and then verify the response from Google on your server. The package supports psr-4.

[![reCAPTCHA from Google](https://www.google.com/recaptcha/intro/images/hero-recaptcha-demo.gif)](https://www.google.com/recaptcha/intro/index.html)

## Install

- [Recaptcha on Packagist](https://packagist.org/packages/htmlwebfan/nocaptcha)
- [Recaptcha on GitHub](https://github.com/htmlwebfan/nocaptcha)

To get the latest version of nocaptcha simply require it in your `composer.json` file.

"htmlwebfan/nocaptcha": "dev-master"

You'll then need to run `composer install` to download it and have the autoloader updated.

## Usage

### Overview

1. Configure NoCaptcha
2. Display the nocaptcha filed on the form
3. When the form is posted to your processor script, verify that the nocaptcha response is valid 

## Configure
Open the Config.php file and set the constants with the the sitekey and the secret values you got from 
Google [Google](https://www.google.com/recaptcha/intro/index.html)

### Display 
``` php

// form_page.php

// Instantiate a NoCaptcha object and initialize it with the Config 
// object containing your keys
$nb = new NoCaptcha(new Config);  

// Generate the HTML code for your nocaptcha form field
$nb->generateField();

// When the user successfully completes the turing test, Google will set a 
// g-recaptcha-response on your form that will be posted to your processing script

```

### Verify captcha from the server

``` php
// processor_script.php

// The value Google gave you on the form when the user completed the test
$r = $_POST['g-recaptcha-response']; 

// Do not forget to filter your input here, I have not done so here in order 
// to keep the example simple
$em = $_POST['email'];

$nobot = new NoCaptcha(new Config);
$nobot->setResponse($r);
$v = $nobot->verify();

// verify() returns a stdCalss Object with a success property with a value of 1
// Any other value means the verification failed. The class has a debug() method 
// for troubleshooting failures like so:

$nobot->debug()

```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nocaptcha@htmlwebfan.com instead of using the issue tracker.

## Credits

- [Matthew Way](https://github.com/htmlwebfan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support

If you find this code beneficial, you can contribute here:

[![Support via PayPal](https://raw.githubusercontent.com/htmlwebfan/resources/master/paypal-donate.jpg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VFP8YNMR6S34S)
