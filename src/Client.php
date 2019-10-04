<?php

namespace Barchart\OnDemand;

use Barchart\OnDemand\Exceptions;
use Barchart\OnDemand\Traits\Endpoints;

class Client
{
    use Endpoints;

    /**
     * The current version of the library.
     *
     * @var string
     */
    protected $version = '1.1.2';

    /**
     * API key to make requests with.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Query options to make on the request
     *
     * @var array
     */
    protected $options;

    public function __construct($apiKey, $options = [])
    {
        $this->apiKey = $apiKey;

        $this->options = $options;
    }

    /**
     * Adds the API key and retrieves the data.
     *
     * @param  string $endpoint
     * @param  array $parameters
     *
     * @return array
     */
    public function makeRequest($endpoint, $parameters)
    {
        $parameters['apikey'] = $this->apiKey;
        $url = $this->getUrl($endpoint, $parameters);

        return $this->retrieveData($url);
    }

    /**
     * Retrieves the data via CURL.
     *
     * @param  string $url
     *
     * @return array|null
     */
    protected function retrieveData($url)
    {
        $output = $statusCode = null;

        if (! function_exists('curl_init')) {
            $output = file_get_contents($url, false, stream_context_create(['http' => ['ignore_errors' => true]]));

            if (is_array($http_response_header)) {
                $statusCode = explode(' ', $http_response_header[0])[1];
            }

            return $this->getResponse($output, $statusCode);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, 'barchart-ondemand-client-php/'.$this->version);

        $output = curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return $this->getResponse($output, $statusCode);
    }

    protected function getResponse($output, $statusCode)
    {
        switch ($statusCode) {
            case 200: case 204: return json_decode($output, true);
            case 400: throw new Exceptions\BadRequestException($output);
            case 401: throw new Exceptions\AuthorizationException;
            case 500: throw new Exceptions\ServerErrorException;
        }
    }

    /**
     * Retrieve the full URL for the endpoint and format.
     *
     * @param  string $endpoint
     *
     * @return string
     */
    protected function getUrl($endpoint, $parameters)
    {
        $host = isset($this->options['host']) ? $this->options['host'] : 'ondemand.websol.barchart.com';

        return 'https://'.$host.'/'.$endpoint.'.json?'.http_build_query($parameters);
    }
}
