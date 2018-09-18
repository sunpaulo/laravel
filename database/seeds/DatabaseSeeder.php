<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const MANAGER_COUNT = 10;
    const CLIENTS_COUNT = 30;
    const PRODUCT_COUNT = 100;

    public function run()
    {
        $this->call([
            ClientSeeder::class,
            ManagerSeeder::class,
            ProductSeeder::class
        ]);
    }
}
