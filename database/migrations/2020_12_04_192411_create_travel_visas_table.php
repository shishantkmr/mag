<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_visas', function (Blueprint $table) {
            $table->id();
            $table->string('travel_title');
            $table->text('travel_text');
            $table->string('travel_img')->nullable();
            $table->string('travel_url')->nullable();            
            $table->string('travel_slug');
            $table->string('travel_tag')->nullable();
            $table->integer('travel_popular')->nullable();
            $table->integer('travel_status')->nullable();
            $table->datetime('travel_future_post')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_visas');
    }
}
