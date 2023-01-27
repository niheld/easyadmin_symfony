<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            ImageField::new('image')
                ->setBasePath($this->getParameter('app.path.product_images'))
                ->onlyOnIndex(),
            TextField::new('description'),
            NumberField::new('price','Prix Produit'),
            BooleanField::new('status'),
            AssociationField::new('category'),   
            TextareaField::new('imageFile')
                ->hideOnIndex()
                ->setFormTypeOption('allow_delete',false)
                ->setFormType(VichImageType::class)
        ];
    }
    
}
