<?php

namespace Isurance\Testing;

use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Develop a Unit Test for StringTools class
 * Try to use PHPUnit best practices (setUp, tearDown, dataProviders, annotations, ...)
 */
class StringToolsTest extends TestCase
{
    /** @var StringTools */
    private $stringTools;

    protected function setUp()
    {
        parent::setUp();
        $this->stringTools = new StringTools();
    }

    /**
     * @dataProvider stringsToCapitalizeProvider
     */
    public function testStringToolsWorksWithNoIssues(string $stringToCapitalize, string $expectedString)
    {
        $result = $this->stringTools->capitalize($stringToCapitalize);
        self::assertEquals($expectedString, $result);
    }

    public function stringsToCapitalizeProvider()
    {
        return [
            ['word', 'Word'],
            ['two words', 'Two Words'],
            ['My birthday is on October 8th', 'My Birthday Is On October 8th'],
            ['year 1980', 'Year 1980']
        ];
    }

    public function testStringToolsRaisesAnErrorBecauseParameterTypeIsNotValid()
    {
        self::expectException(InvalidArgumentException::class);
        $this->stringTools->capitalize(new \stdClass());
    }

    public function testStringToolsRaisesAnErrorBecauseParameterIsNumeric()
    {
        self::expectException(InvalidArgumentException::class);
        $this->stringTools->capitalize(1);
    }
}
