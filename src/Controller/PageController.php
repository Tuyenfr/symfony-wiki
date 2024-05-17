<?php

namespace App\Controller;

use App\Entity\WikiGlobalCalendar;
use App\Repository\WikiGlobalCalendarRepository;
use App\Phpscripts\GlobalCalendar;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $websiteName = 'Wikicampers';
        $teaser1 = 'Location et achat de camping-cars entre particuliers';
        $teaser2 = 'Choisissez votre camping-car pour vos vacances ... ou plus si affinité !';
        $teaser3 = "Bougez au gré de vos envies au volant d'une maison roulante.
                    Soyez libre de dormir chaque nuit sur un spot différent,
                    libre de vous réveiller au bord de la mer, au pied de la montagne,
                    libre d'être nomade. La route est une source de possibilités infinies,
                    créez votre propre chemin, choisissez la location d'un camping-car.
                    Pour vous lancer dans cette aventure, parcourez Wikicampers et faites le choix de votre compagnon de voyage idéal.
                    Du combi vintage au camping-car intégral moderne, des milliers de véhicules aménagés en location vous attendent pour tracer votre chemin.
                    Installez-vous confortablement et réservez en quelques clics.";


        return $this->render('page/index.html.twig', [
            'websitename' => $websiteName,
            'teaser1' => $teaser1,
            'teaser2' => $teaser2,
            'teaser3' => $teaser3,
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig', []);
    }

    #[Route('/calendar', name: 'app_calendar')]
    public function calendar(WikiGlobalCalendarRepository $globaldates, $id = 1): Response
    {

        $globalCalendar = new GlobalCalendar();

        if ($globalCalendar) {

            $globalDates = $globaldates->findFieldsById($id);

            $startDate = $globalDates[0]['start_date']->format('Y-m-d');
            $startDateTimestamp = strtotime($startDate);
            $endDate = $globalDates[0]['end_date']->format('Y-m-d');
            $endDateTimestamp = strtotime($endDate);

            if ($startDateTimestamp && $endDateTimestamp) {
                $globalCalendar->addDateRange($startDateTimestamp, $endDateTimestamp);
            }
        }

        $dates = $globalCalendar->dates;

        $websiteName = 'Wikicampers';

        return $this->render('page/calendar.html.twig', [
            'dates' => $dates,
            'websitename' => $websiteName
        ]);
    }
}
