<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407084627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CC00A36A');
        $this->addSql('DROP INDEX IDX_6A2CA10CC00A36A ON media');
        $this->addSql('ALTER TABLE media CHANGE d_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C4584665A ON media (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C4584665A');
        $this->addSql('DROP INDEX IDX_6A2CA10C4584665A ON media');
        $this->addSql('ALTER TABLE media CHANGE product_id d_id INT NOT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CC00A36A FOREIGN KEY (d_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10CC00A36A ON media (d_id)');
    }
}
