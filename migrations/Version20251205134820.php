<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251205134820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vendor_order (vendor_order_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE vertical_order (vertical_order_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, vendor_order_id INTEGER DEFAULT NULL, CONSTRAINT FK_80D81CAB508C66C9 FOREIGN KEY (vendor_order_id) REFERENCES vendor_order (vendor_order_id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_80D81CAB508C66C9 ON vertical_order (vendor_order_id)');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE post');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, post_id INTEGER DEFAULT NULL, text VARCHAR(255) NOT NULL COLLATE "BINARY", CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9474526C4B89032C ON comment (post_id)');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE "BINARY")');
        $this->addSql('DROP TABLE vendor_order');
        $this->addSql('DROP TABLE vertical_order');
    }
}
