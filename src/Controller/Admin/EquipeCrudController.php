<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
        yield TextField::new('Equipe_fonctions');
        yield TextEditorField::new('Equipe_presentation');
      
    }
    
}