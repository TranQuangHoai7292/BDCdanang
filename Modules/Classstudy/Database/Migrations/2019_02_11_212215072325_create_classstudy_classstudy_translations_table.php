<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassstudyClassstudyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classstudy__classstudy_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('classstudy_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['classstudy_id', 'locale']);
            $table->foreign('classstudy_id')->references('id')->on('classstudy__classstudies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classstudy__classstudy_translations', function (Blueprint $table) {
            $table->dropForeign(['classstudy_id']);
        });
        Schema::dropIfExists('classstudy__classstudy_translations');
    }
}
