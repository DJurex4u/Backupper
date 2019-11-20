<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120110557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connection ADD database_fk_id INT NOT NULL');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366DA6F6929 FOREIGN KEY (database_fk_id) REFERENCES `database` (id)');
        $this->addSql('CREATE INDEX IDX_29F77366DA6F6929 ON connection (database_fk_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366DA6F6929');
        $this->addSql('DROP INDEX IDX_29F77366DA6F6929 ON connection');
        $this->addSql('ALTER TABLE connection DROP database_fk_id');
    }
}
