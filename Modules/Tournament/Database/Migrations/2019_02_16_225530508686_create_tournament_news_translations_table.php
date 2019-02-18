<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament__news_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('news_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['news_id', 'locale']);
            $table->foreign('news_id')->references('id')->on('tournament__news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournament__news_translations', function (Blueprint $table) {
            $table->dropForeign(['news_id']);
        });
        Schema::dropIfExists('tournament__news_translations');
    }
}
