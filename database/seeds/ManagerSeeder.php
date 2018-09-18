<?php

use App\Models\Manager;
use App\Enums\RoleEnum;

class ManagerSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Manager::class, self::MANAGER_COUNT)->create()->each(function (Manager $manager) {
            $manager->roles()->attach(RoleEnum::MANAGER);
        });
    }
}
