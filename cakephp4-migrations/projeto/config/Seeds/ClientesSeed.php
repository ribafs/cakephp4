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

