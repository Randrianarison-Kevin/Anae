<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

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
        yield ImageField::new('actualite_image')
        ->setBasePath('uploads/image')
        ->setUploadDir('public/uploads/image');

        yield DateTimeField::new( 'createdAt') 
            ->hideOnForm();
    }    
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if(!$entityInstance instanceof Actualite) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        
        parent::persistEntity($entityManager,$entityInstance);
    }  
}
