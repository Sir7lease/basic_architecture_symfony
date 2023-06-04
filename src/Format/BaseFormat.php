<?php

namespace App\Format;

class BaseFormat
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function convert(): false|string
    {
        return "I'm not converting anything";
    }

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