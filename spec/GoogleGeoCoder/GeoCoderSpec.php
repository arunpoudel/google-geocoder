<?php

namespace spec\GoogleGeoCoder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeoCoderSpec extends ObjectBehavior
{
    function it_throws_exception_on_invalid_arguments()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', [null, null]);
    }

    function it_should_not_allow_empty_criteria_lookup()
    {
        $this->beConstructedWith('somerandomkey');
        $this->shouldThrow('\InvalidArgumentException')->during('lookup', [null]);
    }

    function it_should_return_promise_on_lookup()
    {
        $this->beConstructedWith('somerandomkey');
        $this->lookup(['address' => 'Lagerveien 9, Stavanger'])->shouldHaveType('GuzzleHttp\Promise\Promise');
    }

    function it_should_be_able_to_get_data_from_google()
    {
        $this->beConstructedWith('somerandomkey');
        $promise = $this->lookup(['address' => 'Lagerveien 9, Stavanger'])
        ->then(
            function ($response) {
            },
            function ($response) {
                throw new \Exception("Getting Data From Google failed.");
            }
        );

        $promise->wait();
    }
}
