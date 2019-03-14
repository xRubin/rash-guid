<?php
declare(strict_types=1);

use rash\guid\Converter;

class ConverterTest extends \PHPUnit\Framework\TestCase
{
    public function testPack(): void
    {
        $this->assertEquals(pack("h*", '622EF99F6CE0F44E18F72A3844B07648'), Converter::pack('622ef99f-6ce0-f44e-18f7-2a3844b07648'));

        $this->expectException(InvalidArgumentException::class);
        Converter::pack('wrong');
    }

    public function testUnpack(): void
    {
        $this->assertEquals('622ef99f-6ce0-f44e-18f7-2a3844b07648', Converter::unpack(pack("h*", '622EF99F6CE0F44E18F72A3844B07648')));

        $this->expectException(InvalidArgumentException::class);
        Converter::unpack('wrong');
    }
}