<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_fullname');
            $table->string('student_class');
            $table->string('student_noijazah');
            $table->string('student_placebirth');
            $table->string('student_datebirth');
            $table->string('student_father');
            $table->string('student_nsm');
            $table->string('student_nisn');
            $table->string('student_nopes');
            $table->string('student_nik');
            $table->string('student_phone')->nullable();
            $table->integer('student_view')->default(0);
            $table->string('student_comment')->nullable();
            $table->string('student_desc')->nullable();
            $table->boolean('student_agreement')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__students');
    }
};
