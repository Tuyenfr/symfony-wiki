<?php

namespace App\Phpscripts;
use App\Phpscripts\Calendar;

class SingleCalendar extends Calendar
{
    public function addDateRange($startDate, $endDate)
    {
        for ($i = $startDate; $i <= $endDate; $i = strtotime('+1 day', $i)) {
            $this->add($i);
        }
    }
}
