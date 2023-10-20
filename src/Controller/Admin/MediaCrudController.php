<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Media::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
        yield TextField::new('Description');

        yield ImageField::new('Media_photo')
        ->setBasePath('uploads/image')
        ->setUploadDir('public/uploads/image');
        
        yield ImageField::new('Media_video')
            ->setBasePath('uploads/video')
            ->setUploadDir('public/uploads/video');
        
        yield ImageField::new('Media_document')
            ->setBasePath('uploads/document')
            ->setUploadDir('public/uploads/document');
 
        yield AssociationField::new('Actualites');
        yield AssociationField::new('Projets');
        yield AssociationField::new('Realisations');

      
    }

}
