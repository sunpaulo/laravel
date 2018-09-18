<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
use App\Enums\RoleEnum;

class CreateRoles extends Migration
{
    public function up()
    {
        $admin = new Role();
        $admin->setId(RoleEnum::ADMIN)
            ->setName('admin')
            ->setDisplayName('Admin')
            ->setDescription('Like a god')
            ->save();

        $manager = new Role();
        $manager->setId(RoleEnum::MANAGER)
            ->setName('manager')
            ->setDisplayName('Manager')
            ->setDescription('Manipulations with goods')
            ->save();

        $client = new Role();
        $client->setId(RoleEnum::CLIENT)
            ->setName('client')
            ->setDisplayName('Client')
            ->setDescription('Default user')
            ->save();
    }

    public function down()
    {
        //
    }
}
