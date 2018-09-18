<?php

use App\Models\Client;
use App\Enums\RoleEnum;

class ClientSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Client::class, self::CLIENTS_COUNT)->create()->each(function (Client $client) {
            $client->roles()->attach(RoleEnum::CLIENT);
        });
    }
}
