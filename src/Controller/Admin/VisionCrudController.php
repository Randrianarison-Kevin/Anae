<?php

namespace App\Controller\Admin;

use App\Entity\Vision;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VisionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vision::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        
           
            yield TextField::new('Vision_titre');
            yield TextareaField::new('Vision_contenu');
       
    }
   
}
