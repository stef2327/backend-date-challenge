<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CalendarHelperTest extends TestCase {

	public function testIsLeapYear() {
		$this->assertEquals(false, \Vice\Challenge\CalendarHelper::isLeapYear(2001));
		$this->assertEquals(true, \Vice\Challenge\CalendarHelper::isLeapYear(2000));
		$this->assertEquals(true, \Vice\Challenge\CalendarHelper::isLeapYear(1980));
		$this->assertEquals(false, \Vice\Challenge\CalendarHelper::isLeapYear(1900));
	}

	public function testDaysInMonth() {
		$this->assertEquals(29, \Vice\Challenge\CalendarHelper::daysInMonth(2, 2016));
		$this->assertEquals(28, \Vice\Challenge\CalendarHelper::daysInMonth(2, 2015));
		$this->assertEquals(31, \Vice\Challenge\CalendarHelper::daysInMonth(1, 2017));
	}

	public function testSortDates() {
		$date1 = new \Vice\Challenge\DateValue('2001-01-01');
		$date2 = new \Vice\Challenge\DateValue('2001-01-02');
		
		$sorted1 = \Vice\Challenge\CalendarHelper::sortDates($date1, $date2);
		$this->assertEquals($date1->getDay(), $sorted1[0]->getDay());

		$sorted2 = \Vice\Challenge\CalendarHelper::sortDates($date2, $date1);
		$this->assertEquals($date1->getDay(), $sorted2[1]->getDay());
	}

	public function testGetDaysDifference() {
		$this->compareDates('2001-01-01', '2014-11-10');
		$this->compareDates('1998-04-10', '2003-06-15');
		$this->compareDates('1981-10-05', '2012-07-06');
		$this->compareDates('1900-12-21', '2011-09-30');
	}

	private function compareDates($date1, $date2) {
		$d1 = new \Vice\Challenge\DateValue($date1);
		$d2 = new \Vice\Challenge\DateValue($date2);
		$days = \Vice\Challenge\CalendarHelper::getDaysDifference($d1, $d2);

		$dt1 = new DateTime($date1);
		$dt2 = new DateTime($date2);
		$diff = $dt2->diff($dt1)->days;
	
		$this->assertEquals($diff, $days);
	}
}