<?php

namespace Vice\Challenge;

require __DIR__ . '/../vendor/autoload.php';

/**
 *
 * Helper with utility functions between dates
 *
 */
class CalendarHelper {
	const DAYS_BY_MONTH = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    /**
     * Check if the year is a leap year
     *
     * @param $year int
     *
     * @return int
     */
	public static function isLeapYear($year) {
		if ($year % 4 === 0) {
			if ($year % 100 === 0) {
				return ($year % 400 === 0);
			} else {
				return true;
			}
		} 

		return false;
	}

    /**
     * Return number of days in a month
     *
     * @param $month int 1-based
     * @param $year int
     *
     * @return int
     */
	public static function daysInMonth($month, $year) {
		$days = self::DAYS_BY_MONTH[$month - 1];
		if ($month === 2) {
			$days += CalendarHelper::isLeapYear($year);
		}

		return $days;
	}

    /**
     * Return the dates in chronological order
     *
     * @param $date1 DateValue
     * @param $date2 DateValue
     *
     * @return array
     */
	public static function sortDates(DateValue $date1, DateValue $date2) {
		if ($date1->isBefore($date2) >= 0) {
			return [$date1, $date2];
		} else {
			return [$date2, $date1];
		}
	}

    /**
     * Return number of days between two dates as the difference between their 
     * Julian day number representation
     *
     * @param $date1 DateValue
     * @param $date2 DateValue
     *
     * @return int
     */
	public static function getDaysDifference(DateValue $date1, DateValue $date2) {
		return abs($date1->toJulianDayNumber() - $date2->toJulianDayNumber());
	}

    /**
     * Return the nearest full year starting from date1 before date2
     *
     * @param $date1 DateValue
     * @param $date2 DateValue
     *
     * @return array 	date of nearest full year, number of years
     */
	public static function getNearestFullYear(DateValue $date1, DateValue $date2) {
    	$currentDate = new DateValue($date1);
    	$years = 0;
    	while ($currentDate->isBefore($date2) === 1) {
    		$years++;
    		$currentDate->addYear();
    	}

    	return [$currentDate, $years];
	}

    /**
     * Return the nearest full month starting from date1 before date2
     *
     * @param $date1 DateValue
     * @param $date2 DateValue
     *
     * @return array 	date of nearest full month, number of months
     */
	public static function getNearestFullMonth(DateValue $date1, DateValue $date2) {
    	$currentDate = new DateValue($date1);
    	$months = 0;
    	while ($currentDate->isBefore($date2) === 1) {
    		$months++;
    		$currentDate->addMonth();
    	}

    	return [$currentDate, $months];
	}
}