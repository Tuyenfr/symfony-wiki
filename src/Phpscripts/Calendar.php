<?php

namespace App\Phpscripts;

class Calendar
{
    public $dates = [];

    public function add($date)
    {
        $weekday = date('l', $date);
        $weekday_fr = null;
        $day = date('d', $date);
        $month = date('M', $date);
        $year = date('Y', $date);
        $fulldate = $date;
        $price = 0;
        $availability = 'Y';

        switch ($weekday) {
        case 'Monday':
            $weekday_fr = 'Lun';
            break;
        case 'Tuesday':
            $weekday_fr = 'Mar';
            break;
        case 'Wednesday':
            $weekday_fr = 'Mer';
            break;
        case 'Thursday':
            $weekday_fr = 'Jeu';
            break;
        case 'Friday':
            $weekday_fr = 'Ven';
            break;
        case 'Saturday':
            $weekday_fr = 'Sam';
            break;
        case 'Sunday':
            $weekday_fr = 'Dim';
            break;
        default:
            $weekday_fr = "";
        }

        $storedDate = [
            'weekday' => $weekday,
            'weekday_fr' => $weekday_fr,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'date' => $fulldate,
            'pricePerDay' => $price,
            'availability' => $availability,
        ];

        $this->dates[] = $storedDate;
    }
}
