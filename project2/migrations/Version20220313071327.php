<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313071327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE t_article (id INT AUTO_INCREMENT NOT NULL, fk_user_id INT DEFAULT NULL, fk_categories_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(3000) NOT NULL, date_save DATETIME NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_5816B6055741EEB9 (fk_user_id), INDEX IDX_5816B605C6586175 (fk_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_categorie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, date_save DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_comment (id INT AUTO_INCREMENT NOT NULL, fk_user_id INT DEFAULT NULL, fk_article_id INT DEFAULT NULL, comment VARCHAR(1000) NOT NULL, date_save DATETIME NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_CE58EA0F5741EEB9 (fk_user_id), INDEX IDX_CE58EA0F82FA4C0F (fk_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, date_save DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE t_user (id INT AUTO_INCREMENT NOT NULL, fk_pays_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, naissance DATE DEFAULT NULL, password VARCHAR(3000) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', password_to_change TINYINT(1) DEFAULT NULL, password_token VARCHAR(3000) DEFAULT NULL, date_save DATETIME NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_37E5BF3BF85E0677 (username), INDEX IDX_37E5BF3B56CB7F68 (fk_pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE t_article ADD CONSTRAINT FK_5816B6055741EEB9 FOREIGN KEY (fk_user_id) REFERENCES t_user (id)');
        $this->addSql('ALTER TABLE t_article ADD CONSTRAINT FK_5816B605C6586175 FOREIGN KEY (fk_categories_id) REFERENCES t_categorie (id)');
        $this->addSql('ALTER TABLE t_comment ADD CONSTRAINT FK_CE58EA0F5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES t_user (id)');
        $this->addSql('ALTER TABLE t_comment ADD CONSTRAINT FK_CE58EA0F82FA4C0F FOREIGN KEY (fk_article_id) REFERENCES t_article (id)');
        $this->addSql('ALTER TABLE t_user ADD CONSTRAINT FK_37E5BF3B56CB7F68 FOREIGN KEY (fk_pays_id) REFERENCES t_pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE t_comment DROP FOREIGN KEY FK_CE58EA0F82FA4C0F');
        $this->addSql('ALTER TABLE t_article DROP FOREIGN KEY FK_5816B605C6586175');
        $this->addSql('ALTER TABLE t_user DROP FOREIGN KEY FK_37E5BF3B56CB7F68');
        $this->addSql('ALTER TABLE t_article DROP FOREIGN KEY FK_5816B6055741EEB9');
        $this->addSql('ALTER TABLE t_comment DROP FOREIGN KEY FK_CE58EA0F5741EEB9');
        $this->addSql('DROP TABLE t_article');
        $this->addSql('DROP TABLE t_categorie');
        $this->addSql('DROP TABLE t_comment');
        $this->addSql('DROP TABLE t_pays');
        $this->addSql('DROP TABLE t_user');
    }
}
