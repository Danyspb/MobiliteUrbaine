<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217232029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69512B54F8');
        $this->addSql('DROP INDEX IDX_2F566B69512B54F8 ON bus');
        $this->addSql('ALTER TABLE bus DROP busiti_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bus ADD busiti_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69512B54F8 FOREIGN KEY (busiti_id) REFERENCES itineraire (id)');
        $this->addSql('CREATE INDEX IDX_2F566B69512B54F8 ON bus (busiti_id)');
    }
}
