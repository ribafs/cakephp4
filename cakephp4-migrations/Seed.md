# Seed no CakePHP 4

Criar uma seed Clientes

bin/cake bake seed Clientes

Criará o arquivo em config/Seeds

Usar seed para exportar uma tabela existente

bin/cake bake seed --data Clientes

Exportar somente 10 registros

bin/cake bake seed --data --limit 10 Articles

Exportar somente alguns campos

bin/cake bake seed --data --fields id,title,excerpt Articles

Executar todos os seeds existentes populando as tabelas do banco

bin/cake migrations seed

Gerar seed somente de uma tabela usando a opção `--seed`

bin/cake migrations seed --seed ArticlesSeed


## Executando via código
```
use Migrations\Migrations;

$migrations = new Migrations();

// Will return an array of all migrations and their status
$status = $migrations->status();

// Will return true if success. If an error occurred, an exception will be thrown
$migrate = $migrations->migrate();

// Will return true if success. If an error occurred, an exception will be thrown
$rollback = $migrations->rollback();

// Will return true if success. If an error occurred, an exception will be thrown
$markMigrated = $migrations->markMigrated(20150804222900);

// Will return true if success. If an error occurred, an exception will be thrown
$seeded = $migrations->seed();
```

## Usando faker para criar um seed

composer require fzaninotto/faker
```
<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Clientes seed.
 */
class ClientesSeed extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username'      => $faker->userName,
                'password'      => sha1($faker->password),
                'password_salt' => sha1('foo'),
                'email'         => $faker->email,
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'created'       => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('users', $data);
    }
}
```

## Criando seed manualmente com 2 registros
```
<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Clientes seed.
 */
class ClientesSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'body'    => 'foo',
                'created' => date('Y-m-d H:i:s'),
            ],
            [
                'body'    => 'bar',
                'created' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('posts');
        $posts->insert($data)
              ->save();

        // empty the table
        $posts->truncate();
    }
}
```
https://book.cakephp.org/phinx/0/en/index.html


Criando seeders. Cria a classe quase vazia

bin/cake bake seed Clientes


Criar seed usando faker

composer require fzaninotto/faker

Exemplo:
```
<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Clientes seed.
 */
class ClientesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('clientes');
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'nome'      => $faker->name,
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
                'modified '       => date('Y-m-d H:i:s')
            ];
        }

        $table->insert($data)->save();
    }
}
```
Executando o seed criado

bin/cake migrations seed


Exportar uma tabela existente para um arquivo .sql

bin/cake bake seed --data clientes

Cria o arquivo:

config/Seeds/ClientesSeed.php`

Para exportar apenas 10 registros:

bin/cake bake seed --data --limit 10 tabela

https://book.cakephp.org/migrations/3/en/index.html

