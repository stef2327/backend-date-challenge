<?php

namespace Vice\Challenge;

/**
 *
 * Date object
 *
 */
class DateValue {
	
	private $year;
	private $month;
	private $day;

	/**
	 * Constructor
	 * 
	 * @param $date accepts a string or a DateValue object to clone
	 *
	 */
	public function __construct($date) {
		// clone a DateValue object
		if ($date instanceof DateValue) {
			$this->year = $date->getYear();
			$this->month = $date->getMonth();
			$this->day = $date->getDay();
			return;
		}

		if (!is_string($date)) {
			throw new \Exception('Date should be a string');
		}

		// string must be in the YYYY-MM-DD format
		if (!preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/', $date)) {
			throw new \Exception('Date should in the format YYYY-MM-DD');
		}

		// populate instance variables
		list($yearStr, $monthStr, $dayStr) = explode('-', $date);
		$this->year = intval($yearStr);
		$this->month = intval($monthStr);
		$this->day = intval($dayStr);
	}

	/**
	 * Getter for the $year instance variable
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Getter for the $month instance variable
	 */
	public function getMonth() {
		return $this->month;
	}

	/**
	 * Getter for the $day instance variable
	 */
	public function getDay() {
		return $this->day;
	}

	/**
	 * Add a year to the date
	 */
	public function addYear() {
		$this->year++; 
	}

	/**
	 * Add a month to the date
	 */
	public function addMonth() {
		$this->month++; 
		if ($this->month > 12) {
			$this->month = 1;
			$this->addYear();
		}
	}

	/**
	 * Add a day to the date
	 */
	public function addDay() {
		$this->day++; 
		if ($this->day > CalendarHelper::daysInMonth($this->month, $this->year)) {
			$this->day = 1;
			$this->addMonth();
		}
	}

	/**
	 * Setter for the $year instance variable
	 *
	 * @return int
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Setter for the $month instance variable
	 *
	 * @return int
	 */
	public function setMonth($month) {
		$this->month = $month;
	}

	/**
	 * Setter for the $day instance variable
	 *
	 * @return int
	 */
	public function setDay($day) {
		$this->day = $day;
	}

	/**
	 * Convert date to Julian Day Number format
	 * Visit https://en.wikipedia.org/wiki/Julian_day for reference
	 *
	 * @return int
	 */
	public function toJulianDayNumber() {
		$a = floor((14 - $this->getMonth()) / 12);
		$y = $this->getYear() + 4800 - $a;
		$m = $this->getMonth() + 12 * $a - 3;

		return $this->getDay() + floor((153 * $m + 2) / 5) + 365 * $y + floor($y / 4) - floor($y / 100) + floor($y / 400) - 32045;
	}

	/**
	 * Compare this date with another DateValue object
	 * Returns 1, 0 or -1 depending on whether this date 
	 * respectively precedes, is the same or follows the passed object
	 *
	 * @param $date DateValue the date to be compared
	 *
	 * @return int
	 */
	public function isBefore(DateValue $date) {
		// checking year
		if ($this->getYear() < $date->getYear()) {
			return 1;
		} else if ($this->getYear() > $date->getYear()) {
			return -1;
		}

		// same year, checking month
		if ($this->getMonth() < $date->getMonth()) {
			return 1;
		} else if ($this->getMonth() > $date->getMonth()) {
			return -1;
		}

		// same month of same year, checking day
		if ($this->getMonth() < $date->getMonth()) {
			return 1;
		} else if ($this->getMonth() > $date->getMonth()) {
			return -1;
		}

		// same date
		return 0;
	}


}