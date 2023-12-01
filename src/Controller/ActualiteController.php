<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ActualiteRepository $actualiteRepository, Request $request, PaginatorInterface $paginatorInterface ): Response
    {
        $pagination = $paginatorInterface->paginate(
            $actualiteRepository->paginationQuery(),
            $request->query->get('page', 1),
            3
        );

        
        return $this->render('actualite/actualite.html.twig', [
            'pagination'=>$pagination
        ]);
    }
    #[Route('/actualite/{id}', name: 'app_actualite_details')]
    public function details(Actualite $actualite ): Response
    {
        $medias = $actualite->getMedia();
        $images = [];

        foreach ($medias as $media) {
            $images[$media->getId()] = $media->getImages();
        }
        return $this->render('actualite/actualite_details.html.twig', [
            'Actualite'=>$actualite,
            'medias' =>$medias,
            'images' => $images,
        ]);
    }
}
