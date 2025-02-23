<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products',function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('productId');
            $table->bigInteger('categoryId')->unsigned();
            $table->foreign('categoryId')->references('categoryId')->on('categories')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('imagePath')->nullable();
            $table->string('description');
            $table->bigInteger('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
