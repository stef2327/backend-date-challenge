<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class DifferenceCalculatorTest extends TestCase {

	public function testGetDifferenceInYears() {
		$difference = \Vice\Challenge\DifferenceCalculatorImpl::diff('2015-12-12', '2016-12-22');

		$this->assertEquals(1, $difference->getDifferenceInYears());
	}	

	public function testGetDifferenceInMonths() {
		$difference = \Vice\Challenge\DifferenceCalculatorImpl::diff('2015-12-12', '2016-12-22');

		$this->assertEquals(0, $difference->getDifferenceInMonths());
	}	

	public function testGetDifferenceInDays() {
		$difference = \Vice\Challenge\DifferenceCalculatorImpl::diff('2015-12-12', '2016-12-22');

		$this->assertEquals(10, $difference->getDifferenceInDays()); 
	}	

	public function testGetTotalDifferenceInDays() {
		$difference = \Vice\Challenge\DifferenceCalculatorImpl::diff('2015-12-12', '2016-12-22');

		$this->assertEquals(376, $difference->getTotalDifferenceInDays());
	}	

}