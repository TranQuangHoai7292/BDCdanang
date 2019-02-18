<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentTournamentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament__tournament_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tournament_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tournament_id', 'locale']);
            $table->foreign('tournament_id')->references('id')->on('tournament__tournaments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournament__tournament_translations', function (Blueprint $table) {
            $table->dropForeign(['tournament_id']);
        });
        Schema::dropIfExists('tournament__tournament_translations');
    }
}
