# Migrations no CakePHP 4

Instalação do cake

cd /var/www/html ou c:\xampp\htdocs

composer create-project --prefer-dist cakephp/app migrations

cd migrations

Criar o banco no MySQL e o configurar em config/app_local.php

Criar a migration paraa tabela clientes com os campos: nome e email

Antes precisamos instalar o plugin e carregar no aplicativo:

composer require cakephp/migrations "@stable"

bin/cake plugin load Migrations

bin/cake bake migration Clientes nome:string email:string created modified

Criará o arquivo:

config/Migrations/20220208213743_Clientes.php

Que é uma classe com o método change() vazio:
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
Vamos preencher o método de forma adequada para que a migration crie a tabela com os dois campos e adicione created e modified:

Editar o arquivo:

config/Migrations/20220208213743_Clientes.php

E deixar assim:
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
Para que seja criada a tabela no MySQL executar o comando:

bin/cake migrations migrate

Confira a tabela no MySQL

Com isso ele criou as tabelas clientes e phinxlog, esta última controla os logs das migrations no cake.


Agora vamos criar um seed, para que adicione registros de teste para a tabela clientes. Se usarmos a biblioteca faker adicionaremos uma grande quantidade de registros sem esforço.

Instalar a biblioteca faker

composer require fzaninotto/faker

Criar a classe seed papra a tabela clientes

bin/cake bake seed Clientes

Criará o arquivo:

config/Seeds/ClientesSeed.php

Que é isso:
```
<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ClientesSeed extends AbstractSeed
{
    public function run()
    {
        $data = [];

        $table = $this->table('clientes');
        $table->insert($data)->save();
    }
}
```
Precisaremos adicionar o código dentro do método run() contendo a lib faker para gerar 1000 registros:
```
<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ClientesSeed extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'nome'      => $faker->name,
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
        }

        $table = $this->table('clientes');
        $table->insert($data)->save();
    }
}
```
Executar o seed somente para a tabela clientes

bin/cake migrations seed --seed ClientesSeed

Confira os registros na tabela com o MySQL

Conte com:

select count(*) from clientes


Agora, se decidirmos migrar nosso projeto para usar o PostgreSQL, para o SQLite ou para outro SGBD suportado pelo Cake, basta apenas que ajustemos a conexão com o referido SGBD.

Também podemos efetuar alterações na tabela sem perda de dados.


