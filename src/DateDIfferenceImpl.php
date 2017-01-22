<?php

namespace Vice\Challenge;

require __DIR__ . '/../vendor/autoload.php';

class DateDifferenceImpl implements DateDifference {

	private $startDate;
	private $endDate;

	private $years;
	private $nearestFullYear;
	private $months;
	private $nearestFullMonth;
	private $days;

	public function __construct($start, $end) {
		// store dates in chronological order
		list($this->startDate, $this->endDate) = CalendarHelper::sortDates(new DateValue($start), new DateValue($end));

		// compute nearest full year date, starting from startDate
		list($this->nearestFullYear, $this->years) = CalendarHelper::getNearestFullYear($this->startDate, $this->endDate);

		// compute nearest full month date, starting from the nearest full year
		list($this->nearestFullMonth, $this->months) = CalendarHelper::getNearestFullMonth($this->nearestFullYear, $this->endDate);

		// compute number of days from the nearest full month date to the end date
		$this->days = CalendarHelper::getDaysDifference($this->nearestFullMonth, $this->endDate);
	}

    public function getDifferenceInYears() {
    	return $this->years;
    }

    public function getDifferenceInMonths() {
    	return $this->months;
    }

    public function getDifferenceInDays() {
    	return $this->days;
    }

	public function getTotalDifferenceInDays() {
		return CalendarHelper::getDaysDifference($this->startDate, $this->endDate);
	}
}