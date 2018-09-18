<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Category;

class CreateCategoryTable extends Migration
{
    public function up()
    {
        Schema::create(Category::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Category::getTableName());
    }
}
