<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210422194653 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE supplier ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE supplier ADD CONSTRAINT FK_9B2A6C7EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B2A6C7EA76ED395 ON supplier (user_id)');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON supplier (code)');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON user (email)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE supplier DROP FOREIGN KEY FK_9B2A6C7EA76ED395');
        $this->addSql('DROP INDEX UNIQ_9B2A6C7EA76ED395 ON supplier');
        $this->addSql('DROP INDEX search_idx ON supplier');
        $this->addSql('ALTER TABLE supplier DROP user_id');
        $this->addSql('DROP INDEX search_idx ON user');
    }
}
