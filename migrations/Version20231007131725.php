<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231007131725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media ADD actualites_id INT DEFAULT NULL, ADD projets_id INT DEFAULT NULL, ADD realisations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C2EDF1993 FOREIGN KEY (actualites_id) REFERENCES actualite (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CFBAB59A2 FOREIGN KEY (realisations_id) REFERENCES realisation (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C2EDF1993 ON media (actualites_id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C597A6CB7 ON media (projets_id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10CFBAB59A2 ON media (realisations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C2EDF1993');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C597A6CB7');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CFBAB59A2');
        $this->addSql('DROP INDEX IDX_6A2CA10C2EDF1993 ON media');
        $this->addSql('DROP INDEX IDX_6A2CA10C597A6CB7 ON media');
        $this->addSql('DROP INDEX IDX_6A2CA10CFBAB59A2 ON media');
        $this->addSql('ALTER TABLE media DROP actualites_id, DROP projets_id, DROP realisations_id');
    }
}
