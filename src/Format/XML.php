<?php

namespace App\Format;

class XML extends BaseFormat implements FromStringInterface, NamedFormatInterface
{
    public function convert(): string
    {
        $result = '';

        foreach($this->data as $key => $value){
            $result .= "<{$key}>{$value}</{$key}>";
        }

        return htmlspecialchars_decode($result);
    }

    public function convertFromString(string $string)
    {
        // TODO: Implement convertFromString() method.
    }

    public function getName(): string
    {
        return 'XML';
    }
}