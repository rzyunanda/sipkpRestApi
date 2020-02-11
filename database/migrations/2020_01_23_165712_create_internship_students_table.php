<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_students', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('status')->nullable();
            $table->integer('advisor_id')->unsigned();
            $table->date('start_at');
            $table->date('end_at');
            $table->text('report_title')->nullable();
            $table->date('seminar_date')->nullable();
            $table->time('seminar_time')->nullable();
            $table->string('seminar_room')->nullable();
            $table->date('seminar_deadline')->nullable();
            $table->string('internship_score')->nullable();
            $table->string('activity_report')->nullable();
            $table->string('news_event')->nullable();
            $table->string('work_report')->nullable();
            $table->string('certifivate')->nullable();
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposals');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('advisor_id')->references('id')->on('lectures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_students');
    }
}
