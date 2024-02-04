<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240204074342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, book_name VARCHAR(500) DEFAULT NULL, num_pages INT DEFAULT NULL, book_url VARCHAR(1024) DEFAULT NULL, cover_url VARCHAR(1024) NOT NULL, date_created DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_profile CHANGE country_id_id country_id_id INT DEFAULT NULL, CHANGE approval_status_id approval_status_id INT DEFAULT NULL, CHANGE is_deleted is_deleted TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book');
        $this->addSql('ALTER TABLE user_profile CHANGE country_id_id country_id_id INT DEFAULT 239, CHANGE approval_status_id approval_status_id INT DEFAULT 1, CHANGE is_deleted is_deleted TINYINT(1) DEFAULT 0, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
    }
}
