<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterCenterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center__center_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('center_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['center_id', 'locale']);
            $table->foreign('center_id')->references('id')->on('center__centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('center__center_translations', function (Blueprint $table) {
            $table->dropForeign(['center_id']);
        });
        Schema::dropIfExists('center__center_translations');
    }
}
