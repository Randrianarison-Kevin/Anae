<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020100858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_549281976C83CD9F');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_54928197597A6CB7');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C597A6CB7');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP INDEX IDX_549281976C83CD9F ON actualite');
        $this->addSql('DROP INDEX IDX_54928197597A6CB7 ON actualite');
        $this->addSql('ALTER TABLE actualite DROP projets_id, DROP offres_id');
        $this->addSql('DROP INDEX IDX_6A2CA10C597A6CB7 ON media');
        $this->addSql('ALTER TABLE media DROP projets_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, offre_titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, offre_contenu LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, projet_description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, projet_titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE actualite ADD projets_id INT DEFAULT NULL, ADD offres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_54928197597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_549281976C83CD9F FOREIGN KEY (offres_id) REFERENCES offre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_549281976C83CD9F ON actualite (offres_id)');
        $this->addSql('CREATE INDEX IDX_54928197597A6CB7 ON actualite (projets_id)');
        $this->addSql('ALTER TABLE media ADD projets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6A2CA10C597A6CB7 ON media (projets_id)');
    }
}
