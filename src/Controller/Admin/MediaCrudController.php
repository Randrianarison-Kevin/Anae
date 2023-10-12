<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use Vich\UploaderBundle\Form\Type\VichFileType;

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
      
        
      
    }

}
