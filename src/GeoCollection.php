<?php

namespace GoogleGeoCoder;

use ArrayIterator;
use Iterator;

class GeoCollection implements Iterator
{
    protected $collection;

    public function __construct($geo_location_properties)
    {
        $this->collection = new ArrayIterator();
        foreach ($geo_location_properties as $geo_location_property) {
            $this->collection[] = Factory::create('GoogleGeoCoder\GeoLocation', $geo_location_property);
        }
    }

    public function current()
    {
        return current($this->collection);
    }

    public function next()
    {
        return next($this->collection);
    }

    public function key()
    {
        return key($this->collection);
    }

    public function valid()
    {
        return key($this->collection) !== null;
    }

    public function rewind()
    {
        return reset($this->collection);
    }
}
