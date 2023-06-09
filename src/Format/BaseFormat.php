<?php

declare(strict_types=1);

namespace App\Format;

abstract class BaseFormat
{
    protected array $data;

    public abstract function convert(): string;

    // public abstract function convertFromString();

    public function __toString(): string
    {
        return $this->convert();
    }


    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}