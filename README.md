[![Latest Stable Version](https://poser.pugx.org/amefa-fh/recaptcha/v/stable)](https://packagist.org/packages/amefa-fh/recaptcha)
[![Total Downloads](https://poser.pugx.org/amefa-fh/recaptcha/downloads)](https://packagist.org/packages/amefa-fh/recaptcha)
[![License](https://poser.pugx.org/amefa-fh/recaptcha/license)](https://packagist.org/packages/amefa-fh/recaptcha)
[![Monthly Downloads](https://poser.pugx.org/amefa-fh/recaptcha/d/monthly)](https://packagist.org/packages/amefa-fh/recaptcha)

# Integrate Google Recaptcha v2 to your CakePHP project


## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require amefa-fh/recaptcha
```

followed by the command:

```
composer update
```

## Load plugin

From command line:
```
bin/cake plugin load Recaptcha
```

## Load Component and Configure

Override default configure from loadComponent:
```
$this->loadComponent('Recaptcha.Recaptcha', [
    'enable' => true,     // true/false
    'sitekey' => 'your_site_key', //if you don't have, get one: https://www.google.com/recaptcha/intro/index.html
    'secret' => 'your_secret',
    'type' => 'image',  // image/audio
    'theme' => 'light', // light/dark
    'lang' => 'vi',      // default en
    'size' => 'normal'  // normal/compact
    'loadMethod' => 'default', //options default => normal include, usercentrics => activation via usercentrics, gtm => user loads it via google tag manager
    'notLoadedMessage' => "Please allow reCAPTCHA in your privacy settings" //Message if reCAPTCHA not loaded, usercentrics can disable loading
]);
```

## Usage

Display recaptcha in your view:
```
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Recaptcha->display() ?>  // Display recaptcha box in your view, if configure has enable = false, nothing will be displayed
    <?= $this->Form->button() ?>
    <?= $this->Form->end() ?>
```

Verify in your controller function
```
    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            if ($this->Recaptcha->verify()) { // if configure enable = false, it will always return true
                //do something here
            }
            $this->Flash->error(__('Please pass Google Recaptcha first'));
        }
    }
```

Done
