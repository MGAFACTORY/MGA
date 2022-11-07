<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107104453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pro_id INT DEFAULT NULL, particulier_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649C3B7E4BA (pro_id), UNIQUE INDEX UNIQ_8D93D649A89E0E67 (particulier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C3B7E4BA FOREIGN KEY (pro_id) REFERENCES pro (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A89E0E67 FOREIGN KEY (particulier_id) REFERENCES particulier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C3B7E4BA');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A89E0E67');
        $this->addSql('DROP TABLE user');
    }
}
