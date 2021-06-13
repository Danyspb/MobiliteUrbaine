<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217223021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE itineraire_bus (itineraire_id INT NOT NULL, bus_id INT NOT NULL, INDEX IDX_81918017A9B853B8 (itineraire_id), INDEX IDX_819180172546731D (bus_id), PRIMARY KEY(itineraire_id, bus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE itineraire_bus ADD CONSTRAINT FK_81918017A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itineraire_bus ADD CONSTRAINT FK_819180172546731D FOREIGN KEY (bus_id) REFERENCES bus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A1139CEF5B');
        $this->addSql('DROP INDEX IDX_487C9A1139CEF5B ON itineraire');
        $this->addSql('ALTER TABLE itineraire DROP ligne_bus_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE itineraire_bus');
        $this->addSql('ALTER TABLE itineraire ADD ligne_bus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A1139CEF5B FOREIGN KEY (ligne_bus_id) REFERENCES ligne_bus (id)');
        $this->addSql('CREATE INDEX IDX_487C9A1139CEF5B ON itineraire (ligne_bus_id)');
    }
}
