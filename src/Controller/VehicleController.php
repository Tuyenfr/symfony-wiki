<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class VehicleController extends AbstractController
{

    #[Route('/vehicles', name: 'app_vehicle')]
    public function index(VehicleRepository $vehicleRepository): Response
    {
        $websiteName = 'Wikicampers';
        $vehicles = $vehicleRepository->findAll();

        return $this->render('vehicle/index.html.twig', [
            'vehicles' => $vehicles,
            'websitename' => $websiteName

        ]);
    }

    #[Route('/vehicle/{id}', name: 'app_vehicle_show')]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);

        if (!$vehicle) {
            throw $this->createNotFoundException('No vehicle found for id ' . $id);
        }
        
        $websiteName = 'Wikicampers';

        return $this->render('vehicle/show.html.twig', [
            'vehicle' => $vehicle,
            'websitename' => $websiteName
        ]);
    }
}
