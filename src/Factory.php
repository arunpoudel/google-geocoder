<?php

namespace GoogleGeoCoder;

use ReflectionClass;

class Factory
{
    public static function create($class, $arguments)
    {
        return (new ReflectionClass($class))->newInstanceArgs([$arguments]);
    }
}
