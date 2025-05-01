<?php
declare(strict_types=1);

namespace Chu\ChuMaths\Domain\Service;

/**
 *
 * @package chu_maths
 * @author Christian Huppert <chr.huppert@yahoo.de>
 */
class SequenceService
{

    /**
     * getValues.
     *
     * @param int $a
     * @param int $b
     * @param int $iterations
     * @return array|int[]
     */
    public function getValues(int $a, int $b, int $iterations): array
    {
        if ($iterations < 0) {
            return [];
        }

        if ($iterations === 0) {
            return [$a];
        }

        $init = [$a, $b];

        if ($iterations === 1) {
            return $init;
        }

        return $this->getRecursiveValues($init, $iterations - 2);
    }

    /**
     * getValuesByRecursion.
     *
     * @param $values
     * @param $round
     *
     * @return array
     */
    private function getRecursiveValues($values, $round): array
    {
        if ($round === 0) {
            return $values;
        }

        $index = count($values) - 1;
        $values[] = 0.5 * ($values[$index] + $values[$index - 1]);

        return $this->getRecursiveValues($values, $round - 1);
    }
}