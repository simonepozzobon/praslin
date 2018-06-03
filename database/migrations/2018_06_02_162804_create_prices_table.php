<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_tables', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('price_columns', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('price_table_id')->unsigned();
            $table->string('description');
            $table->timestamps();

            $table->foreign('price_table_id')->references('id')->on('price_tables')->onDelete('cascade');
        });

        Schema::create('price_rows', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('price_column_id')->unsigned();
            $table->string('detail');
            $table->timestamps();

            $table->foreign('price_column_id')->references('id')->on('price_columns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices_tables');
        Schema::dropIfExists('price_columns');
        Schema::dropIfExists('price_rows');
    }
}
