<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcTracerAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc__tracer__answers', function (Blueprint $table) {
            $table->id();
            $table->char('student_id', 10);
            $table->char('nisn', 20);
            $table->string('status')->nullable();
            $table->string('soal1')->nullable();
            $table->string('soal2')->nullable();
            $table->string('soal3')->nullable();
            $table->string('soal4')->nullable();
            $table->string('soal5')->nullable();
            $table->string('soal6')->nullable();
            $table->string('soal7')->nullable();
            $table->string('soal8')->nullable();
            $table->string('soal9')->nullable();
            $table->string('soal10')->nullable();
            $table->string('id_punya_prestasi')->nullable();
            $table->string('pengerjaan')->nullable();
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
        Schema::dropIfExists('trc__tracer__answers');
    }
}
