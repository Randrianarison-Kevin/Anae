<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017170649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD projets_id INT DEFAULT NULL, ADD offres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_54928197597A6CB7 FOREIGN KEY (projets_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_549281976C83CD9F FOREIGN KEY (offres_id) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX IDX_54928197597A6CB7 ON actualite (projets_id)');
        $this->addSql('CREATE INDEX IDX_549281976C83CD9F ON actualite (offres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_54928197597A6CB7');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_549281976C83CD9F');
        $this->addSql('DROP INDEX IDX_54928197597A6CB7 ON actualite');
        $this->addSql('DROP INDEX IDX_549281976C83CD9F ON actualite');
        $this->addSql('ALTER TABLE actualite DROP projets_id, DROP offres_id');
    }
}
