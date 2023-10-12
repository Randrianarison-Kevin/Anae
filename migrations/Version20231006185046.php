<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231006185046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media ADD actualite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10CA2843073 ON media (actualite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CA2843073');
        $this->addSql('DROP INDEX IDX_6A2CA10CA2843073 ON media');
        $this->addSql('ALTER TABLE media DROP actualite_id');
    }
}
