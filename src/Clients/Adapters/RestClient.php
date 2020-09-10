<?php

namespace Zhiru\LaravelMoodle\Clients\Adapters;

use Zhiru\LaravelMoodle\Clients\BaseAdapter;
use Zhiru\LaravelMoodle\Connection;
use Assert\Assertion;
use GuzzleHttp\Client as HttpClient;

/**
 * Class RestClient
 * @package Zhiru\LaravelMoodle\Clients
 *
 * @method HttpClient getClient()
 */
class RestClient extends BaseAdapter
{
    /**
     *
     */
    const OPTION_FORMAT = 'moodlewsrestformat';

    /**
     *
     */
    const RESPONSE_FORMAT_JSON = 'json';

    /**
     *
     */
    const RESPONSE_FORMAT_XML = 'xml';

    /**
     * @var string
     */
    protected $responseFormat;

    /**
     * @var string
     */
    protected $connection;

    /**
     * RestClient constructor.
     * @param String $url
     * @param String $token
     * @param String $format
     * @param string $responseFormat
     */
    public function __construct($url, $token, $format = 'json')
    {
        $this->setResponseFormat($format);
        $this->setConnection($url, $token);

        parent::__construct($this->getConnection());
    }

    /**
     * Send API request
     * @param $function
     * @param array $arguments
     * @return array|bool|float|int|\SimpleXMLElement|string
     */
    public function sendRequest($function, array $arguments = [])
    {
        $configuration = [
            self::OPTION_FUNCTION => $function,
            self::OPTION_FORMAT   => $this->responseFormat,
            self::OPTION_TOKEN    => $this->getConnection()->getToken(),
        ];

        $response = $this->getClient()->post('', [
            'form_params' => array_merge($configuration, $arguments)
        ]);

        $this->handleException($response);

        $formattedResponse = $this->responseFormat === self::RESPONSE_FORMAT_JSON ?
            json_decode($response->getBody(), true) :
            simplexml_load_string($response->getBody());

        return $formattedResponse;
    }

    /**
     * Build client instance
     * @return HttpClient
     */
    protected function buildClient()
    {
        return new HttpClient([
            'base_url' => $this->getEndPoint(),
            'base_uri' => $this->getEndPoint()
        ]);
}

    /**
     * Set response format
     * @param string $format
     */
    protected function setResponseFormat($format)
    {
        Assertion::inArray($format, [self::RESPONSE_FORMAT_JSON, self::RESPONSE_FORMAT_XML]);
        $this->responseFormat = $format;
    }

    /**
     * @return string|Connection
     */
    protected function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $url
     * @param $token
     */
    protected function setConnection($url, $token)
    {
        $this->connection = new Connection($url, $token);
    }
}
