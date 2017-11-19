<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171118150236 extends AbstractMigration
{
    /**
     * Returns the description of this migration.
     */
    public function getDescription()
    {
        return 'This is the initial migration which insert region into the table.';
    }

    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO region (`id`, `name`) VALUES (1, 'U.S')");
        $this->addSql("INSERT INTO region (`id`, `name`) VALUES (2, 'Europa')");
        $this->addSql("INSERT INTO region (`id`, `name`) VALUES (3, 'Asia')");

    }

    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE region");
    }
}
