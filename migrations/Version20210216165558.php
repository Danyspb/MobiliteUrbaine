<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216165558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arrets (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrets_itineraire (arrets_id INT NOT NULL, itineraire_id INT NOT NULL, INDEX IDX_AAE7EF608C721D10 (arrets_id), INDEX IDX_AAE7EF60A9B853B8 (itineraire_id), PRIMARY KEY(arrets_id, itineraire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrets_itineraire ADD CONSTRAINT FK_AAE7EF608C721D10 FOREIGN KEY (arrets_id) REFERENCES arrets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arrets_itineraire ADD CONSTRAINT FK_AAE7EF60A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arrets_itineraire DROP FOREIGN KEY FK_AAE7EF608C721D10');
        $this->addSql('DROP TABLE arrets');
        $this->addSql('DROP TABLE arrets_itineraire');
    }
}
