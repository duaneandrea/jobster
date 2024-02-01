<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201073254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, iso VARCHAR(10) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, country_name VARCHAR(255) DEFAULT NULL, iso3 VARCHAR(255) DEFAULT NULL, numcode VARCHAR(255) DEFAULT NULL, phonecode VARCHAR(255) DEFAULT NULL, is_deleted TINYINT(1) DEFAULT NULL, record_date INT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_profile ADD country_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405D8A48BBD FOREIGN KEY (country_id_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_D95AB405D8A48BBD ON user_profile (country_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405D8A48BBD');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP INDEX IDX_D95AB405D8A48BBD ON user_profile');
        $this->addSql('ALTER TABLE user_profile DROP country_id_id');
    }
}
