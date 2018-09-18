<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create(User::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(User::getTableName());
    }
}
