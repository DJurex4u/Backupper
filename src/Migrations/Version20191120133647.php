<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120133647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bdata (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, source_directory VARCHAR(255) NOT NULL, destination_directory VARCHAR(255) NOT NULL, INDEX IDX_A967FF4F166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connection (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, data_id INT NOT NULL, database_fk_id INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, port INT NOT NULL, INDEX IDX_29F77366166D1F9C (project_id), INDEX IDX_29F7736637F5A13C (data_id), INDEX IDX_29F77366DA6F6929 (database_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `database` (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, sever_name VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, driver VARCHAR(255) NOT NULL, port VARCHAR(255) NOT NULL, db_schema VARCHAR(255) NOT NULL, INDEX IDX_C953062E166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period_type (id INT AUTO_INCREMENT NOT NULL, frequency VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, end_date_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, person_in_charge VARCHAR(255) NOT NULL, keep_amount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stored_project (id INT AUTO_INCREMENT NOT NULL, is_persistent TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bdata ADD CONSTRAINT FK_A967FF4F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F7736637F5A13C FOREIGN KEY (data_id) REFERENCES bdata (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366DA6F6929 FOREIGN KEY (database_fk_id) REFERENCES `database` (id)');
        $this->addSql('ALTER TABLE `database` ADD CONSTRAINT FK_C953062E166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F7736637F5A13C');
        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366DA6F6929');
        $this->addSql('ALTER TABLE bdata DROP FOREIGN KEY FK_A967FF4F166D1F9C');
        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366166D1F9C');
        $this->addSql('ALTER TABLE `database` DROP FOREIGN KEY FK_C953062E166D1F9C');
        $this->addSql('DROP TABLE bdata');
        $this->addSql('DROP TABLE connection');
        $this->addSql('DROP TABLE `database`');
        $this->addSql('DROP TABLE period_type');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE stored_project');
        $this->addSql('DROP TABLE user');
    }
}
