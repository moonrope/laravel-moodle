<?php

namespace Zhiru\LaravelMoodle\Clients;

/**
 * Interface ClientAdapterInterface
 * @package Zhiru\LaravelMoodle\Clients
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
