<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407091855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7C00A36A');
        $this->addSql('DROP INDEX UNIQ_BA388B7C00A36A ON cart');
        $this->addSql('ALTER TABLE cart CHANGE d_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA388B7A76ED395 ON cart (user_id)');
        $this->addSql('ALTER TABLE cart_line DROP FOREIGN KEY FK_3EF1B4CF3BDE5358');
        $this->addSql('ALTER TABLE cart_line DROP FOREIGN KEY FK_3EF1B4CFC00A36A');
        $this->addSql('DROP INDEX IDX_3EF1B4CFC00A36A ON cart_line');
        $this->addSql('DROP INDEX IDX_3EF1B4CF3BDE5358 ON cart_line');
        $this->addSql('ALTER TABLE cart_line ADD cart_id INT NOT NULL, ADD product_id INT NOT NULL, DROP d_id, DROP a_id');
        $this->addSql('ALTER TABLE cart_line ADD CONSTRAINT FK_3EF1B4CF1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE cart_line ADD CONSTRAINT FK_3EF1B4CF4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_3EF1B4CF1AD5CDBF ON cart_line (cart_id)');
        $this->addSql('CREATE INDEX IDX_3EF1B4CF4584665A ON cart_line (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7A76ED395');
        $this->addSql('DROP INDEX UNIQ_BA388B7A76ED395 ON cart');
        $this->addSql('ALTER TABLE cart CHANGE user_id d_id INT NOT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7C00A36A FOREIGN KEY (d_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA388B7C00A36A ON cart (d_id)');
        $this->addSql('ALTER TABLE cart_line DROP FOREIGN KEY FK_3EF1B4CF1AD5CDBF');
        $this->addSql('ALTER TABLE cart_line DROP FOREIGN KEY FK_3EF1B4CF4584665A');
        $this->addSql('DROP INDEX IDX_3EF1B4CF1AD5CDBF ON cart_line');
        $this->addSql('DROP INDEX IDX_3EF1B4CF4584665A ON cart_line');
        $this->addSql('ALTER TABLE cart_line ADD d_id INT NOT NULL, ADD a_id INT NOT NULL, DROP cart_id, DROP product_id');
        $this->addSql('ALTER TABLE cart_line ADD CONSTRAINT FK_3EF1B4CF3BDE5358 FOREIGN KEY (a_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE cart_line ADD CONSTRAINT FK_3EF1B4CFC00A36A FOREIGN KEY (d_id) REFERENCES cart (id)');
        $this->addSql('CREATE INDEX IDX_3EF1B4CFC00A36A ON cart_line (d_id)');
        $this->addSql('CREATE INDEX IDX_3EF1B4CF3BDE5358 ON cart_line (a_id)');
    }
}
