<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260215144453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update customer table to add updatedAt property';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE customer ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NOW()');

        $this->addSql('UPDATE customer SET updated_at = NOW() WHERE updated_at IS NULL');

        $this->addSql('ALTER TABLE customer ALTER COLUMN updated_at SET NOT NULL');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer DROP updated_at');
    }
}
