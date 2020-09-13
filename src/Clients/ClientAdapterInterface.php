<?php

namespace moonrope\LaravelMoodle\Clients;

/**
 * Interface ClientAdapterInterface
 * @package moonrope\LaravelMoodle\Clients
 */
interface ClientAdapterInterface
{
    /**
     * Send API request
     * @param $function
     * @param array $arguments
     * @return mixed
     */
    public function sendRequest($function, array $arguments = []);
}
