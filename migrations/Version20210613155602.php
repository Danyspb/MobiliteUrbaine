<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210613155602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arrets (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrets_itineraire (arrets_id INT NOT NULL, itineraire_id INT NOT NULL, INDEX IDX_AAE7EF608C721D10 (arrets_id), INDEX IDX_AAE7EF60A9B853B8 (itineraire_id), PRIMARY KEY(arrets_id, itineraire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus (id INT AUTO_INCREMENT NOT NULL, terminus_id INT DEFAULT NULL, typesbus VARCHAR(255) NOT NULL, nbrplaces INT NOT NULL, INDEX IDX_2F566B697A611A63 (terminus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE itineraire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, ligne_bus_id INT DEFAULT NULL, bus_id INT DEFAULT NULL, horaire TIME NOT NULL, INDEX IDX_487C9A11A76ED395 (user_id), INDEX IDX_487C9A1139CEF5B (ligne_bus_id), INDEX IDX_487C9A112546731D (bus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE itineraire_position_geographique (itineraire_id INT NOT NULL, position_geographique_id INT NOT NULL, INDEX IDX_29D6926A9B853B8 (itineraire_id), INDEX IDX_29D69269AA26E40 (position_geographique_id), PRIMARY KEY(itineraire_id, position_geographique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_bus (id INT AUTO_INCREMENT NOT NULL, bus_id INT DEFAULT NULL, itineraire_id INT DEFAULT NULL, numeroligne VARCHAR(255) NOT NULL, INDEX IDX_FDBE947D2546731D (bus_id), INDEX IDX_FDBE947DA9B853B8 (itineraire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_geographique (id INT AUTO_INCREMENT NOT NULL, positerm_id INT DEFAULT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_A705230208312E0 (positerm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminus (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, userbus_id INT DEFAULT NULL, useroles_id INT DEFAULT NULL, poste_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, cni VARCHAR(255) NOT NULL, numpermis VARCHAR(255) DEFAULT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_8D93D6494DBC64D9 (userbus_id), UNIQUE INDEX UNIQ_8D93D649B29D3B80 (useroles_id), INDEX IDX_8D93D649A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_terminus (user_id INT NOT NULL, terminus_id INT NOT NULL, INDEX IDX_CC502BE1A76ED395 (user_id), INDEX IDX_CC502BE17A611A63 (terminus_id), PRIMARY KEY(user_id, terminus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrets_itineraire ADD CONSTRAINT FK_AAE7EF608C721D10 FOREIGN KEY (arrets_id) REFERENCES arrets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arrets_itineraire ADD CONSTRAINT FK_AAE7EF60A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B697A611A63 FOREIGN KEY (terminus_id) REFERENCES terminus (id)');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A1139CEF5B FOREIGN KEY (ligne_bus_id) REFERENCES ligne_bus (id)');
        $this->addSql('ALTER TABLE itineraire ADD CONSTRAINT FK_487C9A112546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE itineraire_position_geographique ADD CONSTRAINT FK_29D6926A9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itineraire_position_geographique ADD CONSTRAINT FK_29D69269AA26E40 FOREIGN KEY (position_geographique_id) REFERENCES position_geographique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_bus ADD CONSTRAINT FK_FDBE947D2546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE ligne_bus ADD CONSTRAINT FK_FDBE947DA9B853B8 FOREIGN KEY (itineraire_id) REFERENCES itineraire (id)');
        $this->addSql('ALTER TABLE position_geographique ADD CONSTRAINT FK_A705230208312E0 FOREIGN KEY (positerm_id) REFERENCES terminus (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DBC64D9 FOREIGN KEY (userbus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B29D3B80 FOREIGN KEY (useroles_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE user_terminus ADD CONSTRAINT FK_CC502BE1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_terminus ADD CONSTRAINT FK_CC502BE17A611A63 FOREIGN KEY (terminus_id) REFERENCES terminus (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arrets_itineraire DROP FOREIGN KEY FK_AAE7EF608C721D10');
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A112546731D');
        $this->addSql('ALTER TABLE ligne_bus DROP FOREIGN KEY FK_FDBE947D2546731D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DBC64D9');
        $this->addSql('ALTER TABLE arrets_itineraire DROP FOREIGN KEY FK_AAE7EF60A9B853B8');
        $this->addSql('ALTER TABLE itineraire_position_geographique DROP FOREIGN KEY FK_29D6926A9B853B8');
        $this->addSql('ALTER TABLE ligne_bus DROP FOREIGN KEY FK_FDBE947DA9B853B8');
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A1139CEF5B');
        $this->addSql('ALTER TABLE itineraire_position_geographique DROP FOREIGN KEY FK_29D69269AA26E40');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A0905086');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B29D3B80');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B697A611A63');
        $this->addSql('ALTER TABLE position_geographique DROP FOREIGN KEY FK_A705230208312E0');
        $this->addSql('ALTER TABLE user_terminus DROP FOREIGN KEY FK_CC502BE17A611A63');
        $this->addSql('ALTER TABLE itineraire DROP FOREIGN KEY FK_487C9A11A76ED395');
        $this->addSql('ALTER TABLE user_terminus DROP FOREIGN KEY FK_CC502BE1A76ED395');
        $this->addSql('DROP TABLE arrets');
        $this->addSql('DROP TABLE arrets_itineraire');
        $this->addSql('DROP TABLE bus');
        $this->addSql('DROP TABLE itineraire');
        $this->addSql('DROP TABLE itineraire_position_geographique');
        $this->addSql('DROP TABLE ligne_bus');
        $this->addSql('DROP TABLE position_geographique');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE terminus');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_terminus');
    }
}
