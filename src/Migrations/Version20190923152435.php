<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923152435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE questions DROP CONSTRAINT fk_8adc54d567b3b43d');
        $this->addSql('DROP INDEX idx_8adc54d567b3b43d');
        $this->addSql('ALTER TABLE questions RENAME COLUMN users_id TO user_id');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8ADC54D5A76ED395 ON questions (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE questions DROP CONSTRAINT FK_8ADC54D5A76ED395');
        $this->addSql('DROP INDEX IDX_8ADC54D5A76ED395');
        $this->addSql('ALTER TABLE questions RENAME COLUMN user_id TO users_id');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT fk_8adc54d567b3b43d FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8adc54d567b3b43d ON questions (users_id)');
    }
}
