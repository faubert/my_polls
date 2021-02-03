<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203013507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE polls DROP FOREIGN KEY FK_1D3CC6EE1E27F6BF');
        $this->addSql('DROP INDEX IDX_1D3CC6EE1E27F6BF ON polls');
        $this->addSql('ALTER TABLE polls DROP question_id');
        $this->addSql('ALTER TABLE question ADD poll_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E3C947C0F FOREIGN KEY (poll_id) REFERENCES polls (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494E3C947C0F ON question (poll_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE polls ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE polls ADD CONSTRAINT FK_1D3CC6EE1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_1D3CC6EE1E27F6BF ON polls (question_id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E3C947C0F');
        $this->addSql('DROP INDEX IDX_B6F7494E3C947C0F ON question');
        $this->addSql('ALTER TABLE question DROP poll_id');
    }
}
