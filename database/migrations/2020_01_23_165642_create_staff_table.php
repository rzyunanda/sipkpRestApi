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
            $table->string('npwp');
            $table->integer('gender');
            $table->date('birthdate');
            $table->string('bithplace');
            $table->string('phone');
            $table->string('address');
            $table->string('marital_status');
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
