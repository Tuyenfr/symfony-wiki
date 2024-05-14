<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514173144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking CHANGE start_date start_date DATE NOT NULL, CHANGE end_date end_date DATE NOT NULL, CHANGE total_price total_price INT NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking CHANGE start_date start_date DATETIME NOT NULL, CHANGE end_date end_date DATETIME NOT NULL, CHANGE total_price total_price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE vehicle DROP image_name, DROP image_size, DROP updated_at');
    }
}
