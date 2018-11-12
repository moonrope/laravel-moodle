<?php

namespace Zhiru\LaravelMoodle;

use IteratorAggregate;
use ArrayIterator;

/**
 * Class GenericCollection
 * @package Zhiru\LaravelMoodle\Entities
 */
abstract class GenericCollection implements IteratorAggregate
{
    /**
     * @var array
     */
    protected $items;

    /**
     * Get collection items
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }

    /**
     * Get iterator
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
