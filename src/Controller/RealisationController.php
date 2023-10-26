<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Repository\RealisationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Regex;

class RealisationController extends AbstractController
{
    #[Route('/realisation', name: 'app_realisation')]
    public function index(RealisationRepository $realisationRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $pagination = $paginatorInterface->paginate(
            $realisationRepository->paginationQuery(),
            $request->query->get('page', 1),
            3
        );
        return $this->render('realisation/realisation.html.twig', [
            'pagination'=>$pagination
        ]);
    }
    #[Route('/realisation/{id}', name: 'app_realisation_details')]
    public function details(Realisation $realisation ): Response
    {
        $medias = $realisation->getMedia();
        return $this->render('realisation/realisation_details.html.twig', [
            'Realisation'=>$realisation,
            'medias' =>$medias
        ]);
    }
    //#[Route('/phpinfo', name: 'app_phpinfo')]
    //public function phpInfo(): Response
    //{
    //    ob_start(); // Démarre la capture de sortie
    //    phpinfo();    // Affiche les informations de configuration PHP
    //    $phpinfo = ob_get_clean(); // Récupère la sortie et l'assigne à la variable $phpinfo

    //    return new Response($phpinfo); // Affiche les informations PHP dans la réponse Symfony
    //}
}
