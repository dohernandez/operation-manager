<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171119012859 extends AbstractMigration
{
    /**
     * Returns the description of this migration.
     */
    public function getDescription()
    {
        return 'This is the initial migration which insert broker type into the table.';
    }

    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO broker_type (`id`, `type`) VALUES ('1', 'stocks')");
        $this->addSql("INSERT INTO broker_type (`id`, `type`) VALUES ('2', 'cryptocurrencies')");
    }

    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE broker_type");
    }
}
