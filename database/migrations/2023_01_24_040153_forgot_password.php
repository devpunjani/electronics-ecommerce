<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forgotpassword',function (Blueprint $table)
        {
            $table->engine='InnoDB';
            $table->bigIncrements("id");
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('otp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forgotpassword');
    }
};
