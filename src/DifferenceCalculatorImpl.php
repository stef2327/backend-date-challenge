<?php

namespace Vice\Challenge;

require __DIR__ . '/../vendor/autoload.php';

class DifferenceCalculatorImpl implements DifferenceCalculator {

    public static function diff($start, $end) {
    	return new DateDifferenceImpl($start, $end);
    }

}