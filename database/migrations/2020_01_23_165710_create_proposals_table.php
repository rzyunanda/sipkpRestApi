<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->string('background');
            $table->string('problem');
            $table->date('date');
            $table->unsignedInteger('agencies_id');
            $table->integer('status');
            $table->string('response_letter');
            $table->string('note');
            $table->timestamps();

            $table->foreign('agencies_id')->references('id')->on('internship_agencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
