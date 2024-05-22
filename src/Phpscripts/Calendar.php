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
        $month_fr_full = null;
        $month_fr = null;
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

        switch ($month) {
            case 'Jan':
                $month_fr_full = 'Janvier';
                break;
            case 'Feb':
                $month_fr_full = 'Février';
                break;
            case 'Mar':
                $month_fr_full = 'Mars';
                break;
            case 'Apr':
                $month_fr_full = 'Avril';
                break;
            case 'May':
                $month_fr_full = 'Mai';
                break;
            case 'Jun':
                $month_fr_full = 'Juin';
                break;
            case 'Jul':
                $month_fr_full = 'Juillet';
                break;
            case 'Aug':
                $month_fr_full = 'Août';
                break;
            case 'Sep':
                $month_fr_full = 'Septembre';
                break;
            case 'Oct':
                $month_fr_full = 'October';
                break;
            case 'Nov':
                $month_fr_full = 'Novembre';
                break;
            case 'Dec':
                $month_fr_full = 'Décembre';
                break;
            default:
                $month_fr_full = "";
        }

        switch ($month) {
            case 'Jan':
                $month_fr = 'Janv';
                break;
            case 'Feb':
                $month_fr = 'Fév';
                break;
            case 'Mar':
                $month_fr = 'Mars';
                break;
            case 'Apr':
                $month_fr = 'Avr';
                break;
            case 'May':
                $month_fr = 'Mai';
                break;
            case 'Jun':
                $month_fr = 'Juin';
                break;
            case 'Jul':
                $month_fr = 'Juil';
                break;
            case 'Aug':
                $month_fr = 'Août';
                break;
            case 'Sep':
                $month_fr = 'Sep';
                break;
            case 'Oct':
                $month_fr = 'Oct';
                break;
            case 'Nov':
                $month_fr = 'Nov';
                break;
            case 'December':
                $month_fr = 'Dec';
                break;
            default:
                $month_fr = "";
        }

        $storedDate = [
            'weekday' => $weekday,
            'weekday_fr' => $weekday_fr,
            'day' => $day,
            'month' => $month,
            'month_fr_full' => $month_fr_full,
            'month_fr' => $month_fr,
            'year' => $year,
            'date' => $fulldate,
            'pricePerDay' => $price,
            'availability' => $availability,
        ];

        $this->dates[] = $storedDate;
    }
}
