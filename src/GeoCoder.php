<?php

namespace GoogleGeoCoder;

use InvalidArgumentException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Promise\Promise as GuzzlePromise;

class GeoCoder
{
    const GEOCODEURL = "https://maps.googleapis.com/maps/api/geocode/%s?%s";

    protected $api_key;

    protected $client_interface;

    // TODO: Add xml support
    protected $response_type = 'json';

    /**
     * @param string $api_key                       API key for google geocoding
     * @param ClientInterface $client_interface     Guzzle Client Interface
     *
     * @throws InvalidArgumentException
     */
    public function __construct($api_key, ClientInterface $client_interface = null)
    {
        if (is_null($api_key)) {
            throw new InvalidArgumentException(
                'API Key cannot be empty'
            );
        }
        $this->api_key = $api_key;

        if ($client_interface) {
            $this->client_interface = $client_interface;
        } else {
            $this->client_interface = new GuzzleClient();
        }
    }

    /**
     * @param  array $criteria              Criterias for querying geocoding
     * @return GuzzlePromise                The promise for guzzle request
     *
     * @throws InvalidArgumentException
     */
    public function lookup($criteria)
    {
        // TODO: Discuss criteria validation
        if (!is_array($criteria)) {
            throw new InvalidArgumentException(
                'Criteria must be an array with keys and values'
            );
        }

        $lookup_promise = null;

        $lookup_promise = new GuzzlePromise(
            function () use ($criteria, &$lookup_promise) {
                $this->client_interface->sendAsync(
                    new Request(
                        "GET",
                        sprintf(self::GEOCODEURL, $this->response_type, $this->arrayToQueryParams($criteria))
                    )
                )->then(
                    function ($response) use ($lookup_promise) {
                        if ($response->getStatusCode() === 200) {
                            $geo_location_response = json_decode($response->getBody());

                            if ($geo_location_response->status !== "OK") {
                                $lookup_promise->reject(
                                    sprintf(
                                        "Server responded with status %s",
                                        $geo_location_response->status
                                    )
                                );
                            } else {
                                $lookup_promise->resolve(
                                    Factory::create(
                                        'GoogleGeoCoder\GeoCollection',
                                        $geo_location_response->results
                                    )
                                );
                            }
                        } else {
                            $lookup_promise->reject(
                                sprintf(
                                    "Server responded with code %s",
                                    $response->getStatusCode()
                                )
                            );
                        }
                    },
                    function ($response) use ($lookup_promise) {
                        $lookup_promise->reject(
                            sprintf(
                                "Server responded with failure"
                            )
                        );
                    }
                )->wait();
            }
        );

        return $lookup_promise;
    }

    protected function arrayToQueryParams($criteria)
    {
        $criteria['api_key'] = $this->api_key;

        return http_build_query($criteria);
    }
}
