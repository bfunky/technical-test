<?php

namespace Isurance\Algorithms;

use PHPUnit\Framework\TestCase;

class SpecialSumTest extends TestCase
{
    public function testSpecialRaisesAnErrorBecauseKIsNegative()
    {
        self::expectExceptionMessage('negative values are not allowed');
        $result = SpecialSum::calculate(-1, 2);
    }
    public function testSpecialRaisesAnErrorBecauseNIsNegative()
    {
        self::expectExceptionMessage('negative values are not allowed');
        $result = SpecialSum::calculate(2, -1);
    }

    /**
     * @dataProvider specialSumValuesProvider
     */
    public function testSpecialSumCalculatesWithNoIssues(int $k, int $n, int $expected)
    {
        $result = SpecialSum::calculate($k, $n);
        self::assertEquals($expected, $result);
    }

    public function specialSumValuesProvider()
    {
        return [
            [0, 1, 1],
//            [1, 3, 6],
//            [2, 3, 10],
//            [4, 10, 2002],
//            [10, 10, 167960],
//            [20, 20, 131282408400],
//            [30, 30, 114449595062769120],
        ];
    }
}
