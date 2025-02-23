<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories',function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('categoryId');
            $table->string('name')->unique();
            $table->string('imagePath')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
