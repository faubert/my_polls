<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203012532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice ADD participation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A926ACE3B73 FOREIGN KEY (participation_id) REFERENCES participation (id)');
        $this->addSql('CREATE INDEX IDX_C1AB5A926ACE3B73 ON choice (participation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice DROP FOREIGN KEY FK_C1AB5A926ACE3B73');
        $this->addSql('DROP INDEX IDX_C1AB5A926ACE3B73 ON choice');
        $this->addSql('ALTER TABLE choice DROP participation_id');
    }
}
