<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240204145131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job ADD job_owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8197BC482 FOREIGN KEY (job_owner_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F8197BC482 ON job (job_owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8197BC482');
        $this->addSql('DROP INDEX IDX_FBD8E0F8197BC482 ON job');
        $this->addSql('ALTER TABLE job DROP job_owner_id');
    }
}
