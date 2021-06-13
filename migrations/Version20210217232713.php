<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217232713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itineraire ADD bus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A112546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('CREATE INDEX IDX_487C9A112546731D ON itineraire (bus_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A112546731D');
        $this->addSql('DROP INDEX IDX_487C9A112546731D ON itineraire');
        $this->addSql('ALTER TABLE itineraire DROP bus_id');
    }
}
