<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407090540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_address DROP FOREIGN KEY FK_1193CB3FC00A36A');
        $this->addSql('DROP INDEX IDX_1193CB3FC00A36A ON customer_address');
        $this->addSql('ALTER TABLE customer_address CHANGE d_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1193CB3FA76ED395 ON customer_address (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_address DROP FOREIGN KEY FK_1193CB3FA76ED395');
        $this->addSql('DROP INDEX IDX_1193CB3FA76ED395 ON customer_address');
        $this->addSql('ALTER TABLE customer_address CHANGE user_id d_id INT NOT NULL');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3FC00A36A FOREIGN KEY (d_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1193CB3FC00A36A ON customer_address (d_id)');
    }
}
