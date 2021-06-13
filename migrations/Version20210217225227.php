<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217225227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bus DROP FOREIGN KEY FK_FDBE947DA9B853B8');
        $this->addSql('DROP INDEX IDX_FDBE947DA9B853B8 ON ligne_bus');
        $this->addSql('ALTER TABLE ligne_bus CHANGE itineraire_id ligniti_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_bus ADD CONSTRAINT FK_FDBE947D25B1995B FOREIGN KEY (ligniti_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FDBE947D25B1995B ON ligne_bus (ligniti_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bus DROP FOREIGN KEY FK_FDBE947D25B1995B');
        $this->addSql('DROP INDEX UNIQ_FDBE947D25B1995B ON ligne_bus');
        $this->addSql('ALTER TABLE ligne_bus CHANGE ligniti_id itineraire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_bus ADD CONSTRAINT FK_FDBE947DA9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE INDEX IDX_FDBE947DA9B853B8 ON ligne_bus (itineraire_id)');
    }
}
