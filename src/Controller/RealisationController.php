<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Realisation;
use App\Repository\ImageRepository;
use App\Repository\RealisationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function details(Realisation $realisation): Response
    {
      
        $medias = $realisation->getMedia();
        
        
        $images = [];

        foreach ($medias as $media) {
            $images[$media->getId()] = $media->getImages();
        }
        return $this->render('realisation/realisation_details.html.twig', [
            'Realisation'=>$realisation,
            'medias' =>$medias,
            'images' => $images,
          
            
        ]);
    }
}
