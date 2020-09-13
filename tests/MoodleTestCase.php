<?php

namespace moonrope\LaravelMoodle\Tests;

use moonrope\LaravelMoodle\LaravelMoodleServiceProvider;
use moonrope\LaravelMoodle\Connection;
use PHPUnit\Framework\TestCase;

/**
 * Class MoodleTestCase
 * @package moonrope\LaravelMoodle\Tests
 */
class MoodleTestCase extends TestCase
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @var Connection
     */
    private $connection;

    public function setUp(): void
    {
        parent::setUp();
        $this->config = require('config.php');
        $this->connection = new Connection($this->config['connection']['url'], $this->config['connection']['token']);
    }

    /**
     * @return array|mixed
     */
    public function getConfig()
    {
        return $this->config;
    }
    protected function getPackageProviders($app)
    {
        return [
            LaravelMoodleServiceProvider::class,
        ];
    }
    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
