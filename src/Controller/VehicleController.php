<?php

namespace App\Controller;

use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicle', name: 'app_vehicle')]
    public function index(VehicleRepository $vehicleRepository): Response
    {
        $websiteName = 'Wikicampers';
        $vehicles = $vehicleRepository->findAll();

        return $this->render('vehicle/index.html.twig', [
            'vehicles' => $vehicles,
            'websitename' => $websiteName
        ]);
    }
}
