<?php
declare(strict_types=1);

namespace rash\guid;

use Webmozart\Assert\Assert;

class Converter
{
    /**
     * @param string $uuid
     * @return string (hex for mysql BINARY(16) column)
     */
    public static function pack(string $uuid)
    {
        Assert::eq(strlen($uuid), 36, 'GUID must contain 36 chars');

        return pack("h*", str_replace('-', '', $uuid));
    }

    /**
     * @param string $bin
     * @return string
     */
    public static function unpack(string $bin)
    {
        Assert::eq(strlen($bin), 16, 'Binary GUID must contain 16 chars');

        $uuid = unpack("h*", $bin);
        $uuid = preg_replace("/([0-9a-f]{8})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{12})/", "$1-$2-$3-$4-$5", $uuid);
        $uuid = array_merge($uuid);
        return $uuid[0];
    }
}