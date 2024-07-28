<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string("departure_date", 50);
            $table->string("departure_time", 50);
            $table->string("departure_airport", 500);
            $table->string("departure_airline", 500);
            $table->string("stopover1_date", 50)->nullable();
            $table->string("stopover1_time", 50)->nullable();
            $table->string("stopover1_airport", 500)->nullable();
            $table->string("stopover1_airline", 500)->nullable();
            $table->string("stopover2_date", 50)->nullable();
            $table->string("stopover2_time", 50)->nullable();
            $table->string("stopover2_airport", 500)->nullable();
            $table->string("stopover2_airline", 500)->nullable();
            $table->string("stopover3_date", 50)->nullable();
            $table->string("stopover3_time", 50)->nullable();
            $table->string("stopover3_airport", 500)->nullable();
            $table->string("stopover3_airline", 500)->nullable();
            $table->string("arrival_date", 50);
            $table->string("arrival_time", 50);
            $table->string("arrival_airport", 500);
            $table->string("arrival_airline", 500);
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
        Schema::dropIfExists('products');
    }
}
