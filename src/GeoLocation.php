<?php

namespace GoogleGeoCoder;

use stdClass;

class GeoLocation
{
    public function __construct(stdClass $location_property)
    {
        if (property_exists($location_property, 'address_components')) {
            foreach ($location_property->address_components as $address_component) {
                $this->{array_shift($address_component->types)} = $address_component->long_name;
            }
        }

        if (property_exists($location_property, 'formatted_address')) {
            $this->formatted_address = $location_property->formatted_address;
        }

        if (property_exists($location_property, 'geometry') &&
            property_exists($location_property->geometry, 'location')
        ) {
            if (property_exists($location_property->geometry->location, 'lat')) {
                $this->latitude = $location_property->geometry->location->lat;
            }
            if (property_exists($location_property->geometry->location, 'lng')) {
                $this->longitude = $location_property->geometry->location->lng;
            }
        }
    }

    public function __call($method, $args)
    {
        if (0 === strpos($method, 'get')) {
            $virtual_property = substr($method, 3);

            $translated_property = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $virtual_property)), '_');

            if (property_exists($this, $translated_property)) {
                return $this->$translated_property;
            }
        }
        return null;
    }
}
