<?php

declare(strict_types=1);

namespace App\Format;

class YAML extends BaseFormat
{
    public function convert(): string
    {
        $result = '';

        foreach($this->data as $key => $value){
            $result .= "$key:$value\n";
        }

        return htmlspecialchars_decode($result);
    }

    public function getName(): string
    {
        return 'YAML';
    }
}