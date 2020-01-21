<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212092002 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bdata (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, period_type_id INT DEFAULT NULL, source_directory VARCHAR(255) NOT NULL, destination_directory VARCHAR(255) NOT NULL, INDEX IDX_A967FF4F166D1F9C (project_id), INDEX IDX_A967FF4F3EA529CB (period_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bdatabase (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, period_type_id INT DEFAULT NULL, server_name VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, driver VARCHAR(255) NOT NULL, port VARCHAR(255) NOT NULL, db_schema VARCHAR(255) NOT NULL, INDEX IDX_38ED64CB166D1F9C (project_id), INDEX IDX_38ED64CB3EA529CB (period_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connection (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, b_data_id INT DEFAULT NULL, b_database_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, port INT NOT NULL, db_host_name VARCHAR(255) NOT NULL, INDEX IDX_29F77366166D1F9C (project_id), INDEX IDX_29F77366B20322A4 (b_data_id), INDEX IDX_29F77366B41954DD (b_database_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period_type (id INT AUTO_INCREMENT NOT NULL, frequency VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, end_date_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, person_in_charge VARCHAR(255) NOT NULL, keep_amount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stored_project (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, is_persistent TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_C9E81066166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, email VARCHAR(255) NOT NULL, credentials VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bdata ADD CONSTRAINT FK_A967FF4F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE bdata ADD CONSTRAINT FK_A967FF4F3EA529CB FOREIGN KEY (period_type_id) REFERENCES period_type (id)');
        $this->addSql('ALTER TABLE bdatabase ADD CONSTRAINT FK_38ED64CB166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE bdatabase ADD CONSTRAINT FK_38ED64CB3EA529CB FOREIGN KEY (period_type_id) REFERENCES period_type (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366B20322A4 FOREIGN KEY (b_data_id) REFERENCES bdata (id)');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F77366B41954DD FOREIGN KEY (b_database_id) REFERENCES bdatabase (id)');
        $this->addSql('ALTER TABLE stored_project ADD CONSTRAINT FK_C9E81066166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366B20322A4');
        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366B41954DD');
        $this->addSql('ALTER TABLE bdata DROP FOREIGN KEY FK_A967FF4F3EA529CB');
        $this->addSql('ALTER TABLE bdatabase DROP FOREIGN KEY FK_38ED64CB3EA529CB');
        $this->addSql('ALTER TABLE bdata DROP FOREIGN KEY FK_A967FF4F166D1F9C');
        $this->addSql('ALTER TABLE bdatabase DROP FOREIGN KEY FK_38ED64CB166D1F9C');
        $this->addSql('ALTER TABLE connection DROP FOREIGN KEY FK_29F77366166D1F9C');
        $this->addSql('ALTER TABLE stored_project DROP FOREIGN KEY FK_C9E81066166D1F9C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP TABLE bdata');
        $this->addSql('DROP TABLE bdatabase');
        $this->addSql('DROP TABLE connection');
        $this->addSql('DROP TABLE period_type');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE stored_project');
        $this->addSql('DROP TABLE user');
    }
}
