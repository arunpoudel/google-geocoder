# google-geocoder

##Installation
Add this line to you composer.json

`"arunpoudel/php-google-geocoder" : "dev-master"`

OR run

`composer require arunpoudel/php-google-geocoder`

##Usuage

```
<?php

require_once "vendor/autoload.php";

$geo_coder = new GoogleGeoCoder\GeoCoder("AIzaSyB_56jeanT5FQZmtsKq97t5DWtGyXiWFwQ");

$geo_coder->lookup([
    'address' => 'Lagerveien 9, Stavanger'
])->then(function ($geo_collection) {
    foreach ($geo_collection as $geo_location) {
        echo $geo_location->getLatitude() . PHP_EOL;
        echo $geo_location->getLongitude() . PHP_EOL;
    }
})->wait();
```

