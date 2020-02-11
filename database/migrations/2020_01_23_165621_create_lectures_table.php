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
            $table->string('nidn')->nullable();
            $table->string('karpeg')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('religion')->nullable();
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
