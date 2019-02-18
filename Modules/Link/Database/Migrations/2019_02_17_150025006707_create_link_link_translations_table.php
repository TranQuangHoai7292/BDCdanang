<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkLinkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link__link_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('link_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['link_id', 'locale']);
            $table->foreign('link_id')->references('id')->on('link__links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link__link_translations', function (Blueprint $table) {
            $table->dropForeign(['link_id']);
        });
        Schema::dropIfExists('link__link_translations');
    }
}
