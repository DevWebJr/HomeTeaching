<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609031424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'first migration : initialize database and tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, source VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE learner (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, gender TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, grade VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matter (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_class (id INT AUTO_INCREMENT NOT NULL, level_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_33B1AF855FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_book (id INT AUTO_INCREMENT NOT NULL, matter_id INT NOT NULL, level_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_CC9BDD04D614E59F (matter_id), INDEX IDX_CC9BDD045FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school_class ADD CONSTRAINT FK_33B1AF855FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE text_book ADD CONSTRAINT FK_CC9BDD04D614E59F FOREIGN KEY (matter_id) REFERENCES matter (id)');
        $this->addSql('ALTER TABLE text_book ADD CONSTRAINT FK_CC9BDD045FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE school_class DROP FOREIGN KEY FK_33B1AF855FB14BA7');
        $this->addSql('ALTER TABLE text_book DROP FOREIGN KEY FK_CC9BDD045FB14BA7');
        $this->addSql('ALTER TABLE text_book DROP FOREIGN KEY FK_CC9BDD04D614E59F');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE learner');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE matter');
        $this->addSql('DROP TABLE school_class');
        $this->addSql('DROP TABLE text_book');
    }
}
