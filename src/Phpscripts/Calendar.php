<?php

namespace App\Phpscripts;

class Calendar
{
    public $dates = [];

    public function add($date)
    {
        $weekday = date('l', $date);
        $day = date('d', $date);
        $month = date('M', $date);
        $year = date('Y', $date);
        $fulldate = $date;
        $price = 0;
        $availability = 'Y';

        $storedDate = [
            'weekday' => $weekday,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'date' => $fulldate,
            'pricePerDay' => $price,
            'availability' => $availability
        ];

        $this->dates[] = $storedDate;
    }
}