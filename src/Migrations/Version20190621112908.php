<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190621112908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE done_jobs (id INT AUTO_INCREMENT NOT NULL, job_id_id INT DEFAULT NULL, section_id_id INT DEFAULT NULL, job_name VARCHAR(255) NOT NULL, road_section VARCHAR(255) NOT NULL, road_section_begin DOUBLE PRECISION NOT NULL, road_section_end DOUBLE PRECISION NOT NULL, unit_of VARCHAR(20) NOT NULL, quantity INT NOT NULL, done_job_date DATE NOT NULL, note VARCHAR(255) DEFAULT NULL, road_level INT NOT NULL, INDEX IDX_5E6935837E182327 (job_id_id), INDEX IDX_5E693583E813F933 (section_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE road_section (id INT AUTO_INCREMENT NOT NULL, section_id VARCHAR(10) NOT NULL, section_name VARCHAR(255) NOT NULL, unit_id INT NOT NULL, section_begin DOUBLE PRECISION NOT NULL, section_end DOUBLE PRECISION NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE done_jobs ADD CONSTRAINT FK_5E6935837E182327 FOREIGN KEY (job_id_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE done_jobs ADD CONSTRAINT FK_5E693583E813F933 FOREIGN KEY (section_id_id) REFERENCES road_section (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE done_jobs DROP FOREIGN KEY FK_5E693583E813F933');
        $this->addSql('DROP TABLE done_jobs');
        $this->addSql('DROP TABLE road_section');
    }
}
