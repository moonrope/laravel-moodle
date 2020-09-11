<?php

namespace Moonrope\LaravelMoodle\Clients;

/**
 * Interface ClientAdapterInterface
 * @package Moonrope\LaravelMoodle\Clients
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
