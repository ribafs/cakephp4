# Conexões com CakePHP 4 

Com MySQL, PostgreSQL e SQLite

## Conectar o CakePHP 4 no MySQL
```
'Datasources' => [
    'default' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'meu_banco',
        'encoding' => 'utf8',
        'timezone' => 'UTC',
        'cacheMetadata' => true,
    ]
],
```

## Conectar o CakePHP 4 com o postgresql

No config/app_local.php
```
 'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Postgres',
            'host' => 'localhost',
            'port' => 5432,
            'username' => 'postgres',
            'password' => 'postgres',
            'database' => 'cake',
            'schema' => 'public',
```

## Conectar o CakePHP 4 com o SQLite3

No config/app_local.php
```
    'Datasources' => [
        'default' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Sqlite',
        'host' => 'localhost',
        'port' => '',
        'login' => '',
        'password' => '',
        'schema' => 'test',
        'prefix' => '',
        'encoding' => '',
        'persistent' => false,
        'database' => '/backup/www/cake/cake4-bs/cake.sqlite',
```
https://stackoverflow.com/questions/1021980/how-do-i-connect-cakephp-to-a-sqlite-database

Requer sqlite3 instalado e a extensão do sqlite no php

Não precisa criar antes o banco, pois o migrations o criará.

Depois da criação
```
sqlite3 cake
select * from clientes;
.quit
```

