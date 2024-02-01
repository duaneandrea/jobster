<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201071301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_profile (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, cell_number VARCHAR(20) DEFAULT NULL, whats_app VARCHAR(20) DEFAULT NULL, house_address VARCHAR(255) DEFAULT NULL, user_bio VARCHAR(512) DEFAULT NULL, gender VARCHAR(20) DEFAULT NULL, language VARCHAR(100) DEFAULT NULL, country_id INT DEFAULT NULL, approval_status_id INT DEFAULT NULL, ip_address VARCHAR(100) DEFAULT NULL, login_count INT DEFAULT NULL, record_hash VARCHAR(512) DEFAULT NULL, is_deleted TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD user_profile_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649661EACD5 FOREIGN KEY (user_profile_id_id) REFERENCES user_profile (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649661EACD5 ON user (user_profile_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649661EACD5');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP INDEX UNIQ_8D93D649661EACD5 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP user_profile_id_id');
    }
}
