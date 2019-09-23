<?php

namespace JohnDoe\BlogPackage;

class Calculator
{
    private $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function add(int $value)
    {
        $this->result += $value;

        return $this;
    }

    public function subtract(int $value)
    {
        $this->result -= $value;

        return $this;
    }

    public function multiplyBy(int $value)
    {
        $this->result *= $value;

        return $this;
    }

    public function divideBy(int $value)
    {
        $this->result /= $value;

        return $this;
    }

    public function result()
    {
        return $this->result;
    }

    public function __toString()
    {
        return "{$this->result}";
    }
}