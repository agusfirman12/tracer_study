<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->char('major_id', 5);
            $table->char('tracer_answer_id')->nullable();
            $table->string('photo')->nullable();
            $table->char('nisn', 15);
            $table->char('nik', 20);
            $table->char('identity_number', 10);
            $table->string('full_name', 50);
            $table->string('email');
            $table->bigInteger('mobile_phone');
            $table->integer('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
