# Backend Developer Challenge

*Based on [Avanti PHP Test](https://github.com/pradeepmenon/phpdatechallenge)*

## Challenge

Calculate the difference between two given dates (in the format Y-m-d), without using the php standard library, `DateTime`,
 or similar code not written by yourself. This includes composer packages implementing date functions. 

Implement the interface `Vice\Challenge\DifferenceCalculator`, which must return an object implementing `Vice\Challenge\DateDifference`.
Dates are provided to `DifferenceCalculator` in the [format](http://php.net/manual/en/function.date.php) `Y-m-d`, e.g
`2016-12-22`.

```php
$difference = DifferenceCalculator::diff('2015-12-12', '2016-12-22');

$difference->getDifferenceInYears() // = 1
$difference->getDifferenceInMonths() // = 0
$difference->getDifferenceInDays() // = 10
$difference->getTotalDifferenceInDays() // = 376
```

You are free to structure the code anyway you see fit. You may find it easiest to fork this repository and continue
from the base provided.

**Unit tests are strongly encouraged**.
