<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171120220132 extends AbstractMigration
{
    /**
     * Returns the description of this migration.
     */
    public function getDescription()
    {
        return 'This is the initial migration which insert currency into the table.';
    }

    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO currency (`iso`, `name`) VALUES ('EUR', 'Euro')");
        $this->addSql("INSERT INTO currency (`iso`, `name`) VALUES ('USD', 'US Dollar')");
    }

    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE currency");
    }
}
