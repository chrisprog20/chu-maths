<?php
declare(strict_types=1);

namespace Chu\ChuMaths\Service\Date;

use DateTime;
use Exception;

/**
 * DateService.
 *
 * @package chu_maths
 * @author Christian Huppert <christian.huppert@fti.de>
 */
class DateService
{
    /**
     * isDateInFormat.
     *
     * @param string $date
     * @param string $format
     * @return bool
     *
     * @throws Exception
     */
    function isDateInFormat(string $date, string $format = 'd.m.Y'): bool
    {
        $dateObject = (new DateTime($date))->setTime(0, 0);
        $comparisonObject = DateTime::createFromFormat($format, $date)->setTime(0, 0);

        return $dateObject->getTimestamp() === $comparisonObject->getTimestamp();
    }
}
