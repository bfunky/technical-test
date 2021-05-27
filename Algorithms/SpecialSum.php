<?php

namespace Isurance\Algorithms;

use Exception;

class SpecialSum
{

    /**
     * @param int $k
     * @param int $n
     * @return int
     * @throws Exception
     */
    public static function calculate(int $k, int $n): int
    {
        self::guardAgainstNegativeValues($k, $n);

//        $result = 0;
//        if ($k === 0) {
//            return $n;
//        }
//        if ($n === 1) {
//            return $n;
//        }
//        if ($k === 1) {
//            return (array_sum(range(1, $n)));
//        }

        $storedResults = [];
        for ($decK = $k; $decK >= 1; $decK--) {
            for ($incN = 1; $incN <= $n; $incN++) {
                if ($decK === 1) {
                    $storedResults['calculate_k_' . $k . '_n' . $n] = array_sum(range(1, $n));
                }
            }

        }
        return array_sum($storedResults);
    }

    private static function guardAgainstNegativeValues(int $k, int $n)
    {
        if ($k < 0 || $n < 0) {
            throw new Exception('negative values are not allowed');
        }
    }
}