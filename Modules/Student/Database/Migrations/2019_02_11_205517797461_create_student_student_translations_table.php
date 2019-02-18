<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentStudentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__student_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('student_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['student_id', 'locale']);
            $table->foreign('student_id')->references('id')->on('student__students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student__student_translations', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
        Schema::dropIfExists('student__student_translations');
    }
}
