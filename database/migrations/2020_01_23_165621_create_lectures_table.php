<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('nik');
            $table->string('nip');
            $table->string('nidn');
            $table->string('karpeg');
            $table->string('npwp');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('birthplace');
            $table->string('phone');
            $table->text('address');
            $table->integer('marital_status');
            $table->integer('religion');
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
        Schema::dropIfExists('lectures');
    }
}
