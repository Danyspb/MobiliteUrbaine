<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216220107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE itineraire_bus');
        $this->addSql('ALTER TABLE bus ADD itineraire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE INDEX IDX_2F566B69A9B853B8 ON bus (itineraire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE itineraire_bus (itineraire_id INT NOT NULL, bus_id INT NOT NULL, INDEX IDX_81918017A9B853B8 (itineraire_id), INDEX IDX_819180172546731D (bus_id), PRIMARY KEY(itineraire_id, bus_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE itineraire_bus ADD CONSTRAINT FK_819180172546731D FOREIGN KEY (bus_id) REFERENCES bus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itineraire_bus ADD CONSTRAINT FK_81918017A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69A9B853B8');
        $this->addSql('DROP INDEX IDX_2F566B69A9B853B8 ON bus');
        $this->addSql('ALTER TABLE bus DROP itineraire_id');
    }
}
