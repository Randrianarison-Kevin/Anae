<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('actualite_titre');
        yield TextEditorField::new('actualite_contenu');
        yield AssociationField::new('Projets');
        yield AssociationField::new('Offres');
        yield DateField::new('createdAt')
        ->hideOnForm();
        yield DateField::new('updatedAt')
        ->hideOnForm();
        
    }
    
}
