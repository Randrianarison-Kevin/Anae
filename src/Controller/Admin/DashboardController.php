<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Affiliation;
use App\Entity\Competence;
use App\Entity\Equipe;
use App\Entity\Image;
use App\Entity\Media;
use App\Entity\Realisation;
use App\Entity\Vision;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){}
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url=$this->adminUrlGenerator->setController(ActualiteCrudController::class)->generateUrl();
        return $this->redirect($url);
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Anae');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Actualite', 'fas fa-list',Actualite::class);
        yield MenuItem::linkToCrud('Affiliation', 'fas fa-list',Affiliation::class);
        yield MenuItem::linkToCrud('Competence', 'fas fa-list',Competence::class);
        yield MenuItem::linkToCrud('Equipes', 'fas fa-list', Equipe::class);
        yield MenuItem::linkToCrud('Media', 'fas fa-list',Media::class);
        yield MenuItem::linkToCrud('Realisation', 'fas fa-list',Realisation::class);
        yield MenuItem::linkToCrud('Image', 'fas fa-image',Image::class);
        
        
    }    
}
