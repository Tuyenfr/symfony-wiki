<?php

namespace App\Controller\Admin;

use App\Entity\Vehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicle::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield IdField::new('id');
        yield TextField::new('brand', 'marque');
        yield TextField::new('model', 'modèle');
        yield AssociationField::new('user', 'utilisateur');
        yield DateField::new('calendar_start_date', 'Début calendrier');
        yield DateField::new('calendar_end_date', 'Fin calendrier');
        
    }
    
}
