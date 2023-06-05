<?php
require __DIR__ ."/../vendor/autoload.php";

use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\JSON;
use App\Format\NamedFormatInterface;
use App\Format\XML;
use App\Format\YAML;



    $data = [
        "name" => "John",
        "surname" => "Doe"
    ];

    $json = new JSON($data);
    $xml = new XML($data);
    $yml = new YAML($data);

    print_r("\n\nResult of conversion\n\n");

    $formats = [$json, $xml, $yml];

    foreach($formats as $format){
        if($format instanceof NamedFormatInterface) {
            var_dump($format->getName());
        }

        var_dump($format->convert());

        if($format instanceof FromStringInterface) {
            var_dump($format->convertFromString('{"name": "John", "surname": "Doe"}'));
        }
    }




    //var_dump($base->convert());


