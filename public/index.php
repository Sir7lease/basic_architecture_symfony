<?php
    declare(strict_types=1);

    require __DIR__ ."/../vendor/autoload.php";

    use App\Format\BaseFormat;
    use App\Format\JSON;
    use App\Format\NamedFormatInterface;
    use App\Format\XML;
    use App\Format\YAML;

    print_r("Anonymous functions\n\n");

    $data = [
        "name" => "John",
        "surname" => "Doe"
    ];

    $formats = [
        new JSON($data),
        new XML($data),
        new YAML($data),
    ];

    function findByName(string $name, array $formats): ?BaseFormat
    {
        $found = array_filter($formats, function($format) use ($name) {
            return $format->getName() === $name;
        });

        if(count($found)) {
            return reset($found);
        }

        return null;
    }

    var_dump(findByName('XML', $formats));
