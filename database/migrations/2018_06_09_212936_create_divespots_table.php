<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivespotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divespots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lat');
            $table->string('lon');
            $table->integer('reef_type_id')->unsigned();
            $table->integer('dive_level_id')->unsigned();
            $table->string('depth');
            $table->boolean('snorkeling');
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('reef_type_id')->references('id')->on('reef_types')->onDelete('cascade');
            $table->foreign('dive_level_id')->references('id')->on('dive_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divespots');
    }
}
