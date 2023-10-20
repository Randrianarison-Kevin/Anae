<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ActualiteRepository $actualiteRepository ): Response
    {
        return $this->render('actualite/actualite.html.twig', [
            'Actualites'=>$actualiteRepository->findAll()
        ]);
    }
    #[Route('/actualite/{id}', name: 'app_actualite_details')]
    public function details(Actualite $actualite ): Response
    {
        return $this->render('actualite/actualite_details.html.twig', [
            'Actualite'=>$actualite,
        ]);
    }
}
