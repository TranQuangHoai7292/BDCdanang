<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterRegisterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register__register_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('register_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['register_id', 'locale']);
            $table->foreign('register_id')->references('id')->on('register__registers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register__register_translations', function (Blueprint $table) {
            $table->dropForeign(['register_id']);
        });
        Schema::dropIfExists('register__register_translations');
    }
}
