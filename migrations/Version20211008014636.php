<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008014636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bicycle DROP available');
        $this->addSql('ALTER TABLE client CHANGE bonus_points bonus_points INT DEFAULT 0');
        $this->addSql('ALTER TABLE type_bicycle CHANGE bonus_points bonus_points INT DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bicycle ADD available TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE bonus_points bonus_points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_bicycle CHANGE bonus_points bonus_points INT DEFAULT NULL');
    }
}
