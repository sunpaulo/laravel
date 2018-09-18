<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;
use App\Models\User;

class CreateProductTable extends Migration
{
    public function up()
    {
        Schema::create(Product::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->float('price')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manager_id')->references('id')->on(User::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists(Product::getTableName());
    }
}
