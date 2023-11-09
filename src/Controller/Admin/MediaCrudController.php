<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use App\Field\VideoField;
use App\Form\ImageType;
use App\Form\MediaType;
use App\Form\VideoType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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

        yield CollectionField::new('images')
            ->setEntryType(ImageType::class);
 
        yield AssociationField::new('Actualites');
        yield AssociationField::new('Realisations');
    }

}
