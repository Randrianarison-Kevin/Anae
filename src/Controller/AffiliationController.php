<?php

namespace App\Controller;

use App\Repository\AffiliationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffiliationController extends AbstractController
{
    #[Route('/affiliation', name: 'app_affiliation')]
    public function index(AffiliationRepository $affiliationRepository): Response
    {
        $affiliation =$affiliationRepository->findAll();

        return $this->render('affiliation/affiliation.html.twig', [
           'Affiliations' => $affiliation 
        ]);
    }
}
