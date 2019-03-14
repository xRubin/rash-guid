<?php
declare(strict_types=1);

namespace rash\guid;

use Webmozart\Assert\Assert;

class Generator
{
    public static function next(): string
    {
        $data = openssl_random_pseudo_bytes(16);
        Assert::eq(strlen($data), 16, 'Openssl random pseudo problem');

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
