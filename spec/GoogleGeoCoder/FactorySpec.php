<?php

namespace spec\GoogleGeoCoder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactorySpec extends ObjectBehavior
{
    function it_can_create_geo_collection()
    {
        $this->create('GoogleGeoCoder\GeoCollection', [])->shouldHaveType('GoogleGeoCoder\GeoCollection');
    }

    function it_can_create_geo_location()
    {
        $this->create('GoogleGeoCoder\GeoLocation', (object)[])->shouldHaveType('GoogleGeoCoder\GeoLocation');
    }
}
