<?php

namespace App\Phpscripts;
use App\Phpscripts\Calendar;

class GlobalCalendar extends Calendar
{
    public function addDateRange($startDate, $endDate)
    {
        for ($i = $startDate; $i <= $endDate; $i = strtotime('+1 day', $i)) {
            $this->add($i);
        }

    }

}


// Création d'un nouvel objet Wikicalendar
// $globalCalendar = new Globalcalendar();

// $startDateGlobalCalendar = WikiGlobalCalendar::getStartDate();
//$endDateGlobalCalendar = WikiGlobalCalendar::getEndDate();


// Ajout d'une plage de dates au calendrier
//$globalCalendar->addDateRange($startDateGlobalCalendar, $endDateGlobalCalendar);

// Affichage des dates ajoutées
//foreach ($globalCalendar->dates as $date) {
  //  echo date('l, d M Y', $date['date']) . " - Availability: ". $date['availability'] . " - Price per day:". $date['pricePerDay'] ."<br>";
//}
?>