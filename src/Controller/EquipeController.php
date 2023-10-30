<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Repository\EquipeRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Option\EA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_equipe')]
    public function index(EquipeRepository $equipeRepository): Response
    {   
        $equipe = $equipeRepository->findAll();
        return $this->render('equipe/equipe.html.twig', [
            'Equipes'=>$equipe
        ]);
    }
    #[Route('/equipe/{id}', name: 'app_equipe_details')]
    public function details(Equipe $equipe): Response
    {   
        return $this->render('equipe/equipe_details.html.twig', [
            'Equipes'=>$equipe
        ]);
    }
}
