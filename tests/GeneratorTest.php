<?php
declare(strict_types=1);

use rash\guid\Generator;

class GeneratorTest extends \PHPUnit\Framework\TestCase
{
    public function testNext(): void
    {
        $guid = Generator::next();
        $this->assertEquals(36, strlen($guid));
        $this->assertRegExp('/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/is', $guid);
    }

}