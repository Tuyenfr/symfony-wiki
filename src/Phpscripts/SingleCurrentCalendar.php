<?php

namespace App\Phpscripts;

use App\Phpscripts\SingleCalendar;

class SingleCurrentCalendar extends SingleCalendar
{

    public function currentCalendar($dates, $vehicleArray, int $startDateTimestamp, int $endDateTimestamp)
    {
        $currentCalendar = new SingleCalendar();

        $datescount = count($dates);

        $today = date('Y-m-d');
        $todayTimestamp = strtotime($today);
        $todayMonth = date('m', $todayTimestamp); // return 05

        $firstdaytodaymonth = date('Y-' . $todayMonth . '-01');
        $firstdaytodaymonthTimestamp = strtotime($firstdaytodaymonth);
        $firstdaytodaymonthday = date('l', $firstdaytodaymonthTimestamp); // return Wednesday

        $firstdaytodaymonthArrayNb = null;

        for ($i = 0; $i < $datescount; $i++) {
            if (in_array($firstdaytodaymonthTimestamp, $dates[$i])) {
                $firstdaytodaymonthArrayNb = $i;
            }
        }

        if ($firstdaytodaymonthArrayNb == null) {

            $datesfirstarraydate = $dates[0]['timestampDate'];

            $number_gap = ($datesfirstarraydate - $firstdaytodaymonthTimestamp) / 86400;

            switch ($firstdaytodaymonthday) {
                case 'Tuesday':
                    $newnumber_gap = $number_gap + 1;
                    break;
                case 'Wednesday':
                    $newnumber_gap = $number_gap + 2;
                    break;
                case 'Thursday':
                    $newnumber_gap = $number_gap + 3;
                    break;
                case 'Friday':
                    $newnumber_gap = $number_gap + 4;
                    break;
                case 'Saturday':
                    $newnumber_gap = $number_gap + 5;
                    break;
                case 'Sunday':
                    $newnumber_gap = $number_gap + 6;
                    break;
                default:
                    $newnumber_gap = $number_gap;
            }

            $currentstartdate = $startDateTimestamp - ($newnumber_gap * 86400);

            if ($currentstartdate && $endDateTimestamp) {
                $currentCalendar->addDateRange($currentstartdate, $endDateTimestamp);
            }

            $price = $vehicleArray[0]['price_per_day'];
            $currentCalendar->updatePricePerDay($price);

            return $currentCalendar->dates;
        } else {

            switch ($firstdaytodaymonthday) {
                case 'Tuesday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 1;
                    break;
                case 'Wednesday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 2;
                    break;
                case 'Thursday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 3;
                    break;
                case 'Friday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 4;
                    break;
                case 'Saturday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 5;
                    break;
                case 'Sunday':
                    $newnumber_gap = $firstdaytodaymonthArrayNb - 6;
                    break;
                default:
                    $newnumber_gap = $firstdaytodaymonthArrayNb;
            }

            return array_slice($dates, $newnumber_gap);
        }
    }

}
