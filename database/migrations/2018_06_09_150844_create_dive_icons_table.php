<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiveIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('src');
            $table->timestamps();
        });

        Schema::create('iconables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('icon_id')->unsigned();
            $table->morphs('iconable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icons');
        Schema::dropIfExists('iconables');
    }
}
