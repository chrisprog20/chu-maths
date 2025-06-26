<?php

declare(strict_types=1);


namespace Chu\ChuMaths\Service\Prime;

use DateTime;

/**
 * PrimesService.
 *
 * @package chu_maths
 * @author Christian Huppert <chr.huppert@yahoo.de>
 */
class PrimeService
{
    /**
     * getPrimesBetween.
     *
     * @param $start
     * @param $end
     * @return array
     */
    public function getPrimesBetween($start, $end): array
    {
        $primes = [];
        for ($i = $start; $i <= $end; $i++) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
        }
        return $primes;
    }

    /**
     * isPrime.
     *
     * @param int $number
     *
     * @return bool
     */
    public function isPrime(int $number): bool
    {
        if ($number === 2) {
            return true;
        }

        if ($number < 2 || $number % 2 === 0) {
            return false;
        }

        /* it suffices to check until sqrt($n) as if you
        * test with $i > sqrt($n) you already test a number that
        * has occurred before in the for loop; so the factors
        * in $number = $a * $b cannot be bigger than sqrt($number) */

        $testLimit = sqrt($number);

        for ($i = 3; $i <= $testLimit; $i += 2) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * getNextPrimes.
     *
     * @param int $number
     * @param int $nextPrimesAmount
     * @param bool $includeNumber
     *
     * @return array
     */
    public function getNextPrimes(int $number, int $nextPrimesAmount, bool $includeNumber = false): array
    {
        $nextPrimes = [];
        $test = $includeNumber ? $number : $number + 1;
        do {
            if ($this->isPrime($test)) {
                $nextPrimes[] = $test;
            }
            ++$test;
        } while (count($nextPrimes) < $nextPrimesAmount);

        return $nextPrimes;
    }

    /**
     * getNextPrimeYears.
     *
     * @param DateTime $date
     * @param int $nextPrimeYearsAmount
     *
     * @return array
     */
    public function getNextPrimeYears(
        DateTime $date,
        int $nextPrimeYearsAmount = 10
    ): array {
        $comparisonDate = $date->setTime(0, 0);
        $today = (new DateTime())->setTime(0, 0);

        $includeThisYear = $today <= $comparisonDate;

        return $this->getNextPrimes(
            (int)$today->format('Y'),
            $nextPrimeYearsAmount,
            $includeThisYear
        );
    }
}


