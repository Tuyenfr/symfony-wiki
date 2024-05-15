<?php

namespace App\Controller\Admin;

use App\Entity\Vehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicle::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('brand', 'Marque');
        yield TextField::new('model', 'Modèle');
        yield TextField::new('numberplate', 'Plaque d\'immatriculation');
        yield TextField::new('length', 'Longueur');
        yield TextField::new('height', 'Hauteur');
        yield TextField::new('gearbox', 'Boîte de vitesse');
        yield TextField::new('fuel_type', 'Carburant');
        yield TextField::new('kms', 'Kilométrage');
        yield TextField::new('adblue', 'Adblue');
        yield TextEditorField::new('description', 'Description');
        yield AssociationField::new('user', 'Utilisateur');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath('images/vehicles/')->hideOnForm();
        yield DateField::new('calendar_start_date', 'Début calendrier');
        yield DateField::new('calendar_end_date', 'Fin calendrier');
        
    }
    
}
