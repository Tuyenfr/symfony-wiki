<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515085440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle ADD numberplate VARCHAR(255) NOT NULL, ADD length DOUBLE PRECISION NOT NULL, ADD height DOUBLE PRECISION NOT NULL, ADD gearbox VARCHAR(255) NOT NULL, ADD fuel_type VARCHAR(255) NOT NULL, ADD kms INT NOT NULL, ADD year DATE NOT NULL, ADD fuel_consumption VARCHAR(255) DEFAULT NULL, ADD adblue VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle DROP numberplate, DROP length, DROP height, DROP gearbox, DROP fuel_type, DROP kms, DROP year, DROP fuel_consumption, DROP adblue, DROP description');
    }
}
