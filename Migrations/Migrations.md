# Migrations no CakePHP 4

Instalar plugin

composer require cakephp/migrations "@stable"


Carregar no aplicativo

bin/cake plugin load Migrations


Criar uma migration

bin/cake bake migration Clientes nome:string email:string created modified

O comando acima criará o arquivo com apenas a classe vazia em

config/Migrations/20220203175545_Clientes.php:
```
<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Clientes extends AbstractMigration
{
    public function change()
    {
    }
}
```

Adicionar o conteúdo ao método change():
```
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
```

Executar para que seja criada a tabela

bin/cake migrations migrate


Para excluir a tabela do banco

bin/cake migrations rollback


email:string[120]:unique:EMAIL_INDEX

amount:decimal[5,2]


Tipos de campos
```
    string
    text
    integer
    biginteger
    float
    decimal
    datetime
    timestamp
    time
    date
    binary
    boolean
    uuid
```
Criar as migrations: produtos e pedidos relacionadas
```
CREATE TABLE produtos (
    id int primary key auto_increment,
    nome varchar(50) not null,
    quantidade int
);

CREATE TABLE pedidos (
    id int primary key auto_increment,
    data date not null,
    quantidade int,
    produto_id int not null,
    CONSTRAINT `fk-produto` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
```

Working With Foreign Keys
```
    public function change()
    {
        $refTable = $this->table('pedidos')
            ->addColumn('data', 'date')
            ->addColumn('quantidade', 'integer')
            ->addColumn('produto_id', 'integer', ['null' => true])
            ->addForeignKey('produto_id', 'produtos', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->create();
    }
```
## Alterando migrations

### Adicionando campos para uma tabela existente:

bin/cake bake migration AddPriceToProducts price:decimal[5,2]

Após executar o comando acima:
```
<?php
use Migrations\AbstractMigration;

class AddPriceToProducts extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('products');
        $table->addColumn('price', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 5,
            'scale' => 2,
        ]);
        $table->update();
    }
}
```
Adicionando campo como índice de tabela

bin/cake bake migration AddNameIndexToProducts name:string:index

Tamanho de campo

bin/cake bake migration AddFullDescriptionToProducts full_description:string[60]

Alterar campo

bin/cake bake migration AlterPriceOnProducts name:float

Remover campo

bin/cake bake migration RemovePriceFromProducts price


Gerar migration de tabela existente

https://book.cakephp.org/migrations/3/en/index.html#generating-migrations-from-an-existing-database

bin/cake bake migration_snapshot Clientes2 --require-table

/backup/www/cake4-bs/config/Migrations/20220206221504_Clientes2.php

Com o código:
```
<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Clientes2 extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('clientes')
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 55,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('clientes')->drop()->save();
    }
}
```

https://book.cakephp.org/migrations/3/en/index.html
