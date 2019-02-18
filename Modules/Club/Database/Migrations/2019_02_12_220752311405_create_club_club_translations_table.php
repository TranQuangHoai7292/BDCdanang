<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubClubTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club__club_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('club_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['club_id', 'locale']);
            $table->foreign('club_id')->references('id')->on('club__clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club__club_translations', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
        });
        Schema::dropIfExists('club__club_translations');
    }
}
