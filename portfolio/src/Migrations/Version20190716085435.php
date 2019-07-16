<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716085435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, hard_skill TINYINT(1) NOT NULL, soft_skill TINYINT(1) NOT NULL, completion INT NOT NULL, INDEX IDX_D5311670A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_experiences (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, society_name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_30886820A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, INDEX IDX_A0D15379A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplomas (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, name VARCHAR(255) NOT NULL, specialty VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_EEED2AD5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone INT NOT NULL, email VARCHAR(255) NOT NULL, paragraph LONGTEXT NOT NULL, linkedin VARCHAR(255) NOT NULL, github VARCHAR(255) NOT NULL, age INT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, members_number INT NOT NULL, description LONGTEXT NOT NULL, screenshot VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, techno_used LONGTEXT NOT NULL, INDEX IDX_5C93B3A4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE professional_experiences ADD CONSTRAINT FK_30886820A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE languages ADD CONSTRAINT FK_A0D15379A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE diplomas ADD CONSTRAINT FK_EEED2AD5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670A76ED395');
        $this->addSql('ALTER TABLE professional_experiences DROP FOREIGN KEY FK_30886820A76ED395');
        $this->addSql('ALTER TABLE languages DROP FOREIGN KEY FK_A0D15379A76ED395');
        $this->addSql('ALTER TABLE diplomas DROP FOREIGN KEY FK_EEED2AD5A76ED395');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4A76ED395');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE professional_experiences');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE diplomas');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE projects');
    }
}
