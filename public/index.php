<?php
    declare(strict_types=1);

    require __DIR__ ."/../vendor/autoload.php";

    use App\Format\BaseFormat;
    use App\Format\JSON;
    use App\Format\NamedFormatInterface;
    use App\Format\XML;
    use App\Format\YAML;

    print_r("Typed arguments & return types\n\n");

    function convertData(BaseFormat $format)
    {
        return $format->convert();
    }

    function getFormatName(NamedFormatInterface $format): string
    {
        return $format->getName();
    }

    function getFormatByName(array $formats, string $name): ?BaseFormat
    {
        foreach($formats as $format) {
            if($format instanceof NamedFormatInterface && $format->getName()===$name) {
                return $format;
            }
        }
        return null;
    }

    function justDumpData(BaseFormat $format): void
    {
        var_dump($format->convert());
    }

    $data = [
        "name" => "John",
        "surname" => "Doe"
    ];

    $formats = [
        new JSON($data),
        new XML($data),
        new YAML($data),
    ];

    var_dump(getFormatByName($formats, 'XML'));
    justDumpData($formats[0]);

