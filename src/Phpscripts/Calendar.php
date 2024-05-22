<?php

namespace App\Phpscripts;

class Calendar
{
    public $dates = [];

    public function add($date)
    {
        $weekday = date('l', $date);
        $weekday_fr = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'], $weekday);
        $day = date('d', $date);
        $month = date('M', $date);
        $month_fr_full = str_replace(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juimlet', 'Août', 'Septembre', 'October', 'Novembre', 'Décembre'], $month);
        $month_fr = str_replace(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], ['Janv', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'], $month);
        $year = date('Y', $date);
        $fulldate = $date;
        $price = 0;
        $availability = 'Y';


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
