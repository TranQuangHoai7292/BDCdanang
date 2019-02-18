<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service__service_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('service_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['service_id', 'locale']);
            $table->foreign('service_id')->references('id')->on('service__services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service__service_translations', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });
        Schema::dropIfExists('service__service_translations');
    }
}
