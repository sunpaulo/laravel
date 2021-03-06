<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class EntrustSetupTables extends Migration
{
    public function up()
    {
        // Create table for storing roles
        Schema::create(Role::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on(User::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on(Role::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create(Permission::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on(Permission::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on(Role::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
    }

    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop(Permission::getTableName());
        Schema::drop('role_user');
        Schema::drop(Role::getTableName());
    }
}
