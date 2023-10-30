<?php

namespace App\Controller\Admin;

use App\Entity\Affiliation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AffiliationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Affiliation::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        
        yield ImageField::new('Affiliation_logo')
            ->setBasePath('uploads/image')
            ->setUploadDir('public/uploads/image');
        yield TextField::new('Affiliation_nom');
        
    }
    
}
