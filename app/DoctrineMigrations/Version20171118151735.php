<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171118151735 extends AbstractMigration
{
    /**
     * Returns the description of this migration.
     */
    public function getDescription()
    {
        return 'This is the initial migration which insert country into the table.';
    }

    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('US', 'UNITED STATES', 'United States', 1)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('IT', 'ITALY', 'Italy', 2)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('ES', 'SPAIN', 'Spain', 2)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('NL', 'NETHERLANDS', 'Netherlands', 2)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('GB', 'UNITED KINGDOM', 'United Kingdom', 2)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('LU', 'LUXEMBOURG', 'Luxembourg', 2)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('JP', 'JAPAN', 'Japan', 3)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('CN', 'CHINA', 'China', 3)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('HK', 'HONG KONG', 'Hong Kong', 3)");
        $this->addSql("INSERT INTO country (`iso`, `name`, `nice_name`, `region_id`) VALUES ('DE', 'GERMANY', 'Germany', 2)");
    }

    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE country");
    }
}
