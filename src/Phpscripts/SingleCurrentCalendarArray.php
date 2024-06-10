<?php

namespace App\Phpscripts;

class SingleCurrentCalendarArray
{
    private $daysOfWeekEnToFr = [
        'Monday' => 'Lun',
        'Tuesday' => 'Mar',
        'Wednesday' => 'Mer',
        'Thursday' => 'Jeu',
        'Friday' => 'Ven',
        'Saturday' => 'Sam',
        'Sunday' => 'Dim'
    ];

    private $monthsEnToFrShort = [
        'Jan' => 'Janv',
        'Feb' => 'Fév',
        'Mar' => 'Mars',
        'Apr' => 'Avr',
        'May' => 'Mai',
        'Jun' => 'Juin',
        'Jul' => 'Juil',
        'Aug' => 'Août',
        'Sep' => 'Sep',
        'Oct' => 'Oct',
        'Nov' => 'Nov',
        'Dec' => 'Déc'
    ];

    private $monthsEnToFrFull = [
        'Jan' => 'Janvier',
        'Feb' => 'Février',
        'Mar' => 'Mars',
        'Apr' => 'Avril',
        'May' => 'Mai',
        'Jun' => 'Juin',
        'Jul' => 'Juillet',
        'Aug' => 'Août',
        'Sep' => 'Septembre',
        'Oct' => 'Octobre',
        'Nov' => 'Novembre',
        'Dec' => 'Décembre'
    ];

    private function translateDay($day)
    {
        return $this->daysOfWeekEnToFr[$day] ?? $day;
    }

    private function translateMonthShort($month)
    {
        return $this->monthsEnToFrShort[$month] ?? $month;
    }

    private function translateMonthFull($month)
    {
        return $this->monthsEnToFrFull[$month] ?? $month;
    }

    public function arrayCurrentCalendar($currentdates)
    {

        $arraycurrentdatesmonth = [];
        $arrayslicemonth = [];

        if ($currentdates) {
            foreach ($currentdates as $date) {
                $timestampDate = $date['timestampDate'];
                $monthdate = date('m', $timestampDate);

                if (!isset($arrayslicemonth[$monthdate])) {
                    $arrayslicemonth[$monthdate] = [];
                }
                $arrayslicemonth[$monthdate][] = $date;
            }

            if (!empty($arrayslicemonth)) {
                foreach ($arrayslicemonth as $monthdate => $dates) {
                    $lastdayarraynb = array_key_last($dates);
                    $lastTimestamp = $dates[$lastdayarraynb]['timestampDate'];
                    $monthlastday = date('l', $lastTimestamp);

                    $daysToAdd = 0;
                    switch ($monthlastday) {
                        case 'Monday': $daysToAdd = 6; break;
                        case 'Tuesday': $daysToAdd = 5; break;
                        case 'Wednesday': $daysToAdd = 4; break;
                        case 'Thursday': $daysToAdd = 3; break;
                        case 'Friday': $daysToAdd = 2; break;
                        case 'Saturday': $daysToAdd = 1; break;
                    }

                    for ($j = 1; $j <= $daysToAdd; $j++) {
                        $newTimestamp = $lastTimestamp + ($j * 86400);
                        array_push($arrayslicemonth[$monthdate], [
                            'weekday' => date('l', $newTimestamp),
                            'weekday_fr' => $this->translateDay(date('l', $newTimestamp)),
                            'day' => date('d', $newTimestamp),
                            'month' => date('M', $newTimestamp),
                            'month_fr_full' => $this->translateMonthFull(date('M', $newTimestamp)),
                            'month_fr' => $this->translateMonthShort(date('M', $newTimestamp)),
                            'year' => date('Y', $newTimestamp),
                            'timestampDate' => $newTimestamp,
                            'pricePerDay' => $dates[$lastdayarraynb]['pricePerDay'],
                            'availability' => $dates[$lastdayarraynb]['availability'],
                        ]);
                    }

                    $firstTimestamp = $dates[0]['timestampDate'];
                    $monthfirstday = date('l', $firstTimestamp);

                    $daysToSubtract = 0;
                    switch ($monthfirstday) {
                        case 'Tuesday': $daysToSubtract = 1; break;
                        case 'Wednesday': $daysToSubtract = 2; break;
                        case 'Thursday': $daysToSubtract = 3; break;
                        case 'Friday': $daysToSubtract = 4; break;
                        case 'Saturday': $daysToSubtract = 5; break;
                        case 'Sunday': $daysToSubtract = 6; break;
                    }

                    for ($j = 1; $j <= $daysToSubtract; $j++) {
                        $newTimestamp = $firstTimestamp - ($j * 86400);
                        array_unshift($arrayslicemonth[$monthdate], [
                            'weekday' => date('l', $newTimestamp),
                            'weekday_fr' => $this->translateDay(date('l', $newTimestamp)),
                            'day' => date('d', $newTimestamp),
                            'month' => date('M', $newTimestamp),
                            'month_fr_full' => $this->translateMonthFull(date('M', $newTimestamp)),
                            'month_fr' => $this->translateMonthShort(date('M', $newTimestamp)),
                            'year' => date('Y', $newTimestamp),
                            'timestampDate' => $newTimestamp,
                            'pricePerDay' => $dates[0]['pricePerDay'],
                            'availability' => $dates[0]['availability'],
                        ]);
                    }
                }
            }

            $arraycurrentdatesmonth = array_values($arrayslicemonth);
        }
        return $arraycurrentdatesmonth;
    }
}
