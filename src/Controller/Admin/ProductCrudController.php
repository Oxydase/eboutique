<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField; // Utilisation de NumberField pour gérer des valeurs numériques

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('description'),
            NumberField::new('price_ht') // Utilisation de NumberField pour gérer le champ price_ht (double)
                ->setFormTypeOption('attr', ['step' => 'any']) // Permet d'accepter des valeurs avec des décimales
                ->setRequired(true), // Si tu veux rendre ce champ obligatoire
            TextField::new('available'),
            AssociationField::new('category')
                ->setFormTypeOption('choice_label', 'name'),
        ];
    }
}
