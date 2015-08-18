<?php

namespace spec\GoogleGeoCoder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeoCollectionSpec extends ObjectBehavior
{
    public function it_can_store_geo_locations()
    {
        $this->beConstructedWith(
            unserialize(
                'a:1:{i:0;O:8:"stdClass":5:{s:18:"address_components";a:8:{i:0;O:8:"stdClass":3:{s:9:"long_name";s:1:"9";s:10:"short_name";s:1:"9";s:5:"types";a:1:{i:0;s:13:"street_number";}}i:1;O:8:"stdClass":3:{s:9:"long_name";s:10:"Lagerveien";s:10:"short_name";s:10:"Lagerveien";s:5:"types";a:1:{i:0;s:5:"route";}}i:2;O:8:"stdClass":3:{s:9:"long_name";s:9:"Stavanger";s:10:"short_name";s:9:"Stavanger";s:5:"types";a:2:{i:0;s:8:"locality";i:1;s:9:"political";}}i:3;O:8:"stdClass":3:{s:9:"long_name";s:9:"Stavanger";s:10:"short_name";s:9:"Stavanger";s:5:"types";a:1:{i:0;s:11:"postal_town";}}i:4;O:8:"stdClass":3:{s:9:"long_name";s:9:"Stavanger";s:10:"short_name";s:9:"Stavanger";s:5:"types";a:2:{i:0;s:27:"administrative_area_level_2";i:1;s:9:"political";}}i:5;O:8:"stdClass":3:{s:9:"long_name";s:8:"Rogaland";s:10:"short_name";s:8:"Rogaland";s:5:"types";a:2:{i:0;s:27:"administrative_area_level_1";i:1;s:9:"political";}}i:6;O:8:"stdClass":3:{s:9:"long_name";s:6:"Norway";s:10:"short_name";s:2:"NO";s:5:"types";a:2:{i:0;s:7:"country";i:1;s:9:"political";}}i:7;O:8:"stdClass":3:{s:9:"long_name";s:4:"4033";s:10:"short_name";s:4:"4033";s:5:"types";a:1:{i:0;s:11:"postal_code";}}}s:17:"formatted_address";s:36:"Lagerveien 9, 4033 Stavanger, Norway";s:8:"geometry";O:8:"stdClass":3:{s:8:"location";O:8:"stdClass":2:{s:3:"lat";d:58.896600200000002;s:3:"lng";d:5.7037228000000004;}s:13:"location_type";s:7:"ROOFTOP";s:8:"viewport";O:8:"stdClass":2:{s:9:"northeast";O:8:"stdClass":2:{s:3:"lat";d:58.897949180291498;s:3:"lng";d:5.7050717802915019;}s:9:"southwest";O:8:"stdClass":2:{s:3:"lat";d:58.895251219708491;s:3:"lng";d:5.7023738197084981;}}}s:8:"place_id";s:27:"ChIJzS4AE-U1OkYR550HJyINWU4";s:5:"types";a:1:{i:0;s:14:"street_address";}}}'
            )
        );
    }
}
