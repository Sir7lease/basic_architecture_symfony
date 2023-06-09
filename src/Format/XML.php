<?php

declare(strict_types=1);

namespace App\Format;

class XML extends BaseFormat implements FormatInterface, NamedFormatInterface

{
    public function convert(): string
    {
        $result = '';

        foreach($this->data as $key => $value){
            $result .= "<{$key}>{$value}</{$key}>";
        }

        return htmlspecialchars_decode($result);
    }

    public function getName(): string
    {
        return 'XML';
    }
}