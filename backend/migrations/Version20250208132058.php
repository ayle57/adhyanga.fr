<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250208132058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id SERIAL NOT NULL, seance_id INT NOT NULL, price_id INT NOT NULL, customer_id INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, duration INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FE38F844E3797A94 ON appointment (seance_id)');
        $this->addSql('CREATE INDEX IDX_FE38F844D614C7E7 ON appointment (price_id)');
        $this->addSql('CREATE INDEX IDX_FE38F8449395C3F3 ON appointment (customer_id)');
        $this->addSql('CREATE TABLE contact (id SERIAL NOT NULL, customer_id INT NOT NULL, message TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C62E6389395C3F3 ON contact (customer_id)');
        $this->addSql('COMMENT ON COLUMN contact.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN contact.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE option (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN option.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN option.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE price (id SERIAL NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, adult DOUBLE PRECISION NOT NULL, young DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN price.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN price.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE seance (id SERIAL NOT NULL, price_id INT NOT NULL, name VARCHAR(255) NOT NULL, duration INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DF7DFD0ED614C7E7 ON seance (price_id)');
        $this->addSql('CREATE TABLE seance_option (seance_id INT NOT NULL, option_id INT NOT NULL, PRIMARY KEY(seance_id, option_id))');
        $this->addSql('CREATE INDEX IDX_25F31B18E3797A94 ON seance_option (seance_id)');
        $this->addSql('CREATE INDEX IDX_25F31B18A7C41D6F ON seance_option (option_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(50) NOT NULL, terms BOOLEAN NOT NULL, captcha BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8449395C3F3 FOREIGN KEY (customer_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6389395C3F3 FOREIGN KEY (customer_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0ED614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE seance_option ADD CONSTRAINT FK_25F31B18E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE seance_option ADD CONSTRAINT FK_25F31B18A7C41D6F FOREIGN KEY (option_id) REFERENCES option (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844E3797A94');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F844D614C7E7');
        $this->addSql('ALTER TABLE appointment DROP CONSTRAINT FK_FE38F8449395C3F3');
        $this->addSql('ALTER TABLE contact DROP CONSTRAINT FK_4C62E6389395C3F3');
        $this->addSql('ALTER TABLE seance DROP CONSTRAINT FK_DF7DFD0ED614C7E7');
        $this->addSql('ALTER TABLE seance_option DROP CONSTRAINT FK_25F31B18E3797A94');
        $this->addSql('ALTER TABLE seance_option DROP CONSTRAINT FK_25F31B18A7C41D6F');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE option');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE seance_option');
        $this->addSql('DROP TABLE "user"');
    }
}
