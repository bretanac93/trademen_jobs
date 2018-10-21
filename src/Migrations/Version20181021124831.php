<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021124831 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, internal_id VARCHAR(7) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('INSERT INTO category (internal_id, name) VALUES ("804040", "Sonstige Umzugsleistungen");');
        $this->addSql('INSERT INTO category (internal_id, name) VALUES ("802030", "Abtransport, Entsorgung und Entrümpelung");');
        $this->addSql('INSERT INTO category (internal_id, name) VALUES ("411070", "Fensterreinigung");');
        $this->addSql('INSERT INTO category (internal_id, name) VALUES ("402020", "Holzdielen schleifen");');
        $this->addSql('INSERT INTO category (internal_id, name) VALUES ("108140", "Kellersanierung");');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE category');
    }
}
