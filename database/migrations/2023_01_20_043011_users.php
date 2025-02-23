<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('type');
            $table->string('address');
            $table->string('password');
            $table->string('photourl')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
