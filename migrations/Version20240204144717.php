<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240204144717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, job_title VARCHAR(500) NOT NULL, job_description VARCHAR(5000) DEFAULT NULL, skills VARCHAR(5000) DEFAULT NULL, job_type VARCHAR(255) DEFAULT NULL, experience_level VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, salary_range VARCHAR(255) DEFAULT NULL, application_deadline DATETIME DEFAULT NULL, record_hash VARCHAR(1024) DEFAULT NULL, INDEX IDX_FBD8E0F8F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8F92F3E70');
        $this->addSql('DROP TABLE job');
    }
}
