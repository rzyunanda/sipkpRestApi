<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nik');
            $table->string('name');
            $table->string('karpeg');
            $table->string('npwp')->nullable();
            $table->integer('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('bithplace')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
