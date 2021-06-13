<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217231520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69A9B853B8');
        $this->addSql('DROP INDEX IDX_2F566B69A9B853B8 ON bus');
        $this->addSql('ALTER TABLE bus CHANGE itineraire_id busiti_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69512B54F8 FOREIGN KEY (busiti_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE INDEX IDX_2F566B69512B54F8 ON bus (busiti_id)');
        $this->addSql('ALTER TABLE itineraire ADD ligne_bus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A1139CEF5B FOREIGN KEY (ligne_bus_id) REFERENCES ligne_bus (id)');
        $this->addSql('CREATE INDEX IDX_487C9A1139CEF5B ON itineraire (ligne_bus_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69512B54F8');
        $this->addSql('DROP INDEX IDX_2F566B69512B54F8 ON bus');
        $this->addSql('ALTER TABLE bus CHANGE busiti_id itineraire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE INDEX IDX_2F566B69A9B853B8 ON bus (itineraire_id)');
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A1139CEF5B');
        $this->addSql('DROP INDEX IDX_487C9A1139CEF5B ON itineraire');
        $this->addSql('ALTER TABLE itineraire DROP ligne_bus_id');
    }
}
