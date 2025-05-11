<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Category; // Assurez-vous d'importer l'entité Category
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField; // Importation du champ AssociationField

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
            TextField::new('name'), // Ajouter les autres champs ici selon ta table Product
            TextEditorField::new('description'),
            TextField::new('price_ht'),
            TextField::new('available'),
            AssociationField::new('category') // Ajouter le champ category ici pour la sélection de la catégorie
                ->setFormTypeOption('choice_label', 'name') // Choisir le champ 'name' pour afficher les catégories dans la liste déroulante
        ];
    }
}
