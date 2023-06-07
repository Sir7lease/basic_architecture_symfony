<?php

declare(strict_types=1);

namespace App\Format;

class JSON extends BaseFormat implements FromStringInterface, NamedFormatInterface
{
    public function convert(): false|string
    {
        return json_encode($this->data);
    }

    public function convertFromString(string $string): array
    {
        return json_decode($string, true);
    }

    public function getName(): string
    {
        return 'JSON';
    }
}