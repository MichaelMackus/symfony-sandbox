<?php

namespace AppBundle\Data;

/**
 * Represents a simple value object.
 */
final class MyValueObject
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
