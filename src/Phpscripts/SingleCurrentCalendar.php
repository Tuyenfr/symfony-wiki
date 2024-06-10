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

    public function arrayCurrentCalendar($currentdates)
    {

        $today = date('Y-m-d');
        $todayTimestamp = strtotime($today);
        $todayMonth = date('m', $todayTimestamp); // return 05

        if ($currentdates) {

            $loop = count($currentdates) / 35;

            for ($i = 0; $i < $loop; $i++) {

                foreach ($currentdates as $date) {

                    $weekdaydate = date('l', $date);
                    $daydate = date('d', $date);
                    $monthdate = date('m', $date);

                    $arraycurrentdatesmonth = [];

                    $arrayslicemonth = [];
                    $monthnb = $todayMonth + $i;

                    if ($monthdate == $monthnb) {
                        array_push($arrayslicemonth, $date);
                        $countarrayslicemonth = count($arrayslicemonth);
                        $lastdayarraynb = $countarrayslicemonth - 1;
                        $weekdaylastday = date('l', $arrayslicemonth[$lastdayarraynb]);
                    }

                    if ($daydate == '01' && $weekdaydate == 'Tuesday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        array_unshift($arrayslicemonth, $dateToAdd1);
                    } elseif ($daydate == '01' && $weekdaydate == 'Wednesday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        $dateToAdd2 = $arrayslicemonth[0] - (2 * 86400);
                        array_unshift($arrayslicemonth, $dateToAdd2, $dateToAdd1);
                    } elseif ($daydate == '01' && $weekdaydate == 'Thursday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        $dateToAdd2 = $arrayslicemonth[0] - (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[0] - (3 * 86400);
                        array_unshift($arrayslicemonth, $dateToAdd3, $dateToAdd2, $dateToAdd1);
                    } elseif ($daydate == '01' && $weekdaydate == 'Friday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        $dateToAdd2 = $arrayslicemonth[0] - (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[0] - (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[0] - (4 * 86400);
                        array_unshift($arrayslicemonth, $dateToAdd4, $dateToAdd3, $dateToAdd2, $dateToAdd1);
                    } elseif ($daydate == '01' && $weekdaydate == 'Saturday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        $dateToAdd2 = $arrayslicemonth[0] - (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[0] - (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[0] - (4 * 86400);
                        $dateToAdd5 = $arrayslicemonth[0] - (5 * 86400);
                        array_unshift($newarrayslicemonth, $dateToAdd5, $dateToAdd4, $dateToAdd3, $dateToAdd2, $dateToAdd1);
                    } elseif ($daydate == '01' && $weekdaydate == 'Sunday') {
                        $dateToAdd1 = $arrayslicemonth[0] - 86400;
                        $dateToAdd2 = $arrayslicemonth[0] - (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[0] - (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[0] - (4 * 86400);
                        $dateToAdd5 = $arrayslicemonth[0] - (5 * 86400);
                        $dateToAdd6 = $arrayslicemonth[0] - (6 * 86400);
                        array_unshift($newarrayslicemonth, $dateToAdd6, $dateToAdd5, $dateToAdd4, $dateToAdd3, $dateToAdd2, $dateToAdd1);
                    }

                    if ($weekdaylastday == "Monday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;
                        $dateToAdd2 = $arrayslicemonth[$lastdayarraynb] + (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[$lastdayarraynb] + (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[$lastdayarraynb] + (4 * 86400);
                        $dateToAdd5 = $arrayslicemonth[$lastdayarraynb] + (5 * 86400);
                        $dateToAdd6 = $arrayslicemonth[$lastdayarraynb] + (6 * 86400);

                        array_push($arrayslicemonth, $dateToAdd1, $dateToAdd2, $dateToAdd3, $dateToAdd4, $dateToAdd5, $dateToAdd6);
                    } elseif ($weekdaylastday == "Tuesday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;
                        $dateToAdd2 = $arrayslicemonth[$lastdayarraynb] + (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[$lastdayarraynb] + (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[$lastdayarraynb] + (4 * 86400);
                        $dateToAdd5 = $arrayslicemonth[$lastdayarraynb] + (5 * 86400);

                        array_push($arrayslicemonth, $dateToAdd1, $dateToAdd2, $dateToAdd3, $dateToAdd4, $dateToAdd5);
                    } elseif ($weekdaylastday == "Wednesday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;
                        $dateToAdd2 = $arrayslicemonth[$lastdayarraynb] + (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[$lastdayarraynb] + (3 * 86400);
                        $dateToAdd4 = $arrayslicemonth[$lastdayarraynb] + (4 * 86400);

                        array_push($arrayslicemonth, $dateToAdd1, $dateToAdd2, $dateToAdd3, $dateToAdd4);
                    } elseif ($weekdaylastday == "Thursday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;
                        $dateToAdd2 = $arrayslicemonth[$lastdayarraynb] + (2 * 86400);
                        $dateToAdd3 = $arrayslicemonth[$lastdayarraynb] + (3 * 86400);

                        array_push($arrayslicemonth, $dateToAdd1, $dateToAdd2, $dateToAdd3);
                    } elseif ($weekdaylastday == "Friday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;
                        $dateToAdd2 = $arrayslicemonth[$lastdayarraynb] + (2 * 86400);

                        array_push($arrayslicemonth, $dateToAdd1, $dateToAdd2);
                    }  elseif ($weekdaylastday == "Saturday") {
                        $dateToAdd1 = $arrayslicemonth[$lastdayarraynb] + 86400;

                        array_push($arrayslicemonth, $dateToAdd1);
                    }

                    array_push($arraycurrentdatesmonth, $arrayslicemonth);
                }
            }
        }

        return $arraycurrentdatesmonth;
    }
}
