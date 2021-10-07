<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007145746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rental ADD bicycle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DA69645CF FOREIGN KEY (bicycle_id) REFERENCES bicycle (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1619C27DA69645CF ON rental (bicycle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DA69645CF');
        $this->addSql('DROP INDEX UNIQ_1619C27DA69645CF ON rental');
        $this->addSql('ALTER TABLE rental DROP bicycle_id');
    }
}
