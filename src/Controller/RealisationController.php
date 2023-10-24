<?php

namespace App\Controller;

use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisationController extends AbstractController
{
    #[Route('/realisation', name: 'app_realisation')]
    public function index(RealisationRepository $realisationRepository): Response
    {
        return $this->render('realisation/realisation.html.twig', [
            "Realisations"=>$realisationRepository->findAll()
        ]);
    }
}
