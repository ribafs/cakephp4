<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Clientes extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('clientes');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 55,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}

