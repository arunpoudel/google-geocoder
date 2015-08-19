google-geocoder
===============

[![Build Status](https://travis-ci.org/arunpoudel/google-geocoder.svg?branch=master)](https://travis-ci.org/arunpoudel/google-geocoder)
[![Coverage Status](https://coveralls.io/repos/arunpoudel/google-geocoder/badge.svg?branch=master&service=github)](https://coveralls.io/github/arunpoudel/google-geocoder?branch=master)

PHP Library for Google Geocoder

##Installation
Add this line to you composer.json

`"arunpoudel/php-google-geocoder" : "dev-master"`

OR run

`composer require arunpoudel/php-google-geocoder`

##Usuage

```php
<?php

require_once 'vendor/autoload.php';

$geoCoder = new GoogleGeoCoder\GeoCoder('YourKeyGoesHere');

$geoCoder->lookup([
    'address' => 'Lagerveien 9, Stavanger'
])->then(function ($geoCollection) {
    foreach ($geoCollection as $geoLocation) {
        echo $geoLocation->getLatitude() . PHP_EOL;
        echo $geoLocation->getLongitude() . PHP_EOL;
    }
})->wait();
```

