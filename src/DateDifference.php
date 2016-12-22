<?php


namespace Vice\Challenge;


interface DateDifference
{
    /**
     * The distance between two dates in years, rounded down to the nearest whole year.
     *
     * I.e for a difference of 10 years and 9 months, the result of this call should be 10.
     *
     * @return int
     */
    public function getDifferenceInYears();

    /**
     * The distance between two dates in months, rounded down to the nearest whole month, counted from the start of the year.
     *
     * I.e for a difference of 10 years, 9 months and 25 days, the result of this call should be 9.
     *
     * @return int
     */
    public function getDifferenceInMonths();

    /**
     * The distance between two dates in days, counted from the start of the month
     *
     * I.e for a difference of 10 years, 9 months and 25 days, the result of this call should be 9.
     *
     * @return int
     */
    public function getDifferenceInDays();

    /**
     * The total distance between two dates in days.
     *
     * I.e between 2015-12-12 and 2016-12-22 there are 376 days.
     *
     * @return int
     */
    public function getTotalDifferenceInDays();
}
