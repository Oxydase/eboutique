<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407090915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7B3BDE5358');
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7BC00A36A');
        $this->addSql('DROP INDEX IDX_70BE1A7B3BDE5358 ON command_line');
        $this->addSql('DROP INDEX IDX_70BE1A7BC00A36A ON command_line');
        $this->addSql('ALTER TABLE command_line ADD order_id INT NOT NULL, ADD product_id INT NOT NULL, DROP a_id, DROP d_id');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7B8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7B4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_70BE1A7B8D9F6D38 ON command_line (order_id)');
        $this->addSql('CREATE INDEX IDX_70BE1A7B4584665A ON command_line (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7B8D9F6D38');
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7B4584665A');
        $this->addSql('DROP INDEX IDX_70BE1A7B8D9F6D38 ON command_line');
        $this->addSql('DROP INDEX IDX_70BE1A7B4584665A ON command_line');
        $this->addSql('ALTER TABLE command_line ADD a_id INT NOT NULL, ADD d_id INT NOT NULL, DROP order_id, DROP product_id');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7B3BDE5358 FOREIGN KEY (a_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7BC00A36A FOREIGN KEY (d_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_70BE1A7B3BDE5358 ON command_line (a_id)');
        $this->addSql('CREATE INDEX IDX_70BE1A7BC00A36A ON command_line (d_id)');
    }
}
