<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
      
            
        yield TextField::new('Equipe_nom');
        yield ImageField::new('Equipe_photos')
        ->setBasePath('uploads/image')
        ->setUploadDir('public/uploads/image');
    
        yield TextField::new('Equipe_fonctions');
        yield TextareaField::new('Equipe_presentation');
      
    }
    
}
