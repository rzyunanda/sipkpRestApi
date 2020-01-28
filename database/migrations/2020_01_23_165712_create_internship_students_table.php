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
            $table->integer('status');
            $table->integer('advisor_id')->unsigned();
            $table->date('start_at');
            $table->date('end_at');
            $table->text('report_title');
            $table->date('seminar_date');
            $table->time('seminar_time');
            $table->string('seminar_room');
            $table->date('seminar_deadline');
            $table->string('internship_score');
            $table->string('activity_report');
            $table->string('news_event');
            $table->string('work_report');
            $table->string('certifivate');
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
