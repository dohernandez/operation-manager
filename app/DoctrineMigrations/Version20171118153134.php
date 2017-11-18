<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171118153134 extends AbstractMigration
{
    /**
     * Returns the description of this migration.
     */
    public function getDescription()
    {
        return 'This is the initial migration which insert operation type into the table.';
    }

    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO operation_type (`id`, `type`) VALUES ('1', 'sell')");
        $this->addSql("INSERT INTO operation_type (`id`, `type`) VALUES ('2', 'buy')");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE operation_type");
    }
}
