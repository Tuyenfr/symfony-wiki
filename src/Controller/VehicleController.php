<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Phpscripts\SingleCalendar;
use App\Phpscripts\SingleCurrentCalendar;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{

    #[Route('/vehicles', name: 'app_vehicle')]
    public function index(VehicleRepository $vehicleRepository): Response
    {
        $websiteName = 'Wikicampers';
        $vehicles = $vehicleRepository->findAll();

        return $this->render('vehicle/index.html.twig', [
            'vehicles' => $vehicles,
            'websitename' => $websiteName,

        ]);
    }

    #[Route('/vehicle/{id}', name: 'app_vehicle_show')]
    public function show(int $id, EntityManagerInterface $entityManager, VehicleRepository $vehiclearray): Response
    {
        $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);

        $singleCalendar = new SingleCalendar();

        if ($singleCalendar) {

            $vehicleArray = $vehiclearray->findFieldsbyId($id);

            $startDate = $vehicleArray[0]['calendar_start_date']->format('Y-m-d');
            $startDateTimestamp = strtotime($startDate);
            $endDate = $vehicleArray[0]['calendar_end_date']->format('Y-m-d');
            $endDateTimestamp = strtotime($endDate);

            if ($startDateTimestamp && $endDateTimestamp) {
                $singleCalendar->addDateRange($startDateTimestamp, $endDateTimestamp);
            }

            $price = $vehicleArray[0]['price_per_day'];
            $singleCalendar->updatePricePerDay($price);
            $dates = $singleCalendar->dates;

            // Create current calendar

            $currentCalendar = new SingleCurrentCalendar();
            $currentdates = $currentCalendar->currentCalendar($dates, $vehicleArray, $startDateTimestamp, $endDateTimestamp);
            $loop = count($currentdates) / 35;

        }

        $websiteName = 'Wikicampers';

        return $this->render(
            'vehicle/show.html.twig',
            [
                'vehicle' => $vehicle,
                'currentdates' => $currentdates,
                'loop' => $loop,
                'websitename' => $websiteName
            ]
        );
    }
}
