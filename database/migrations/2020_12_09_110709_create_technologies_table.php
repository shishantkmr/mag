<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
         $table->id();
         $table->string('technology_title');
         $table->text('technology_text');
         $table->string('technology_img')->nullable();
         $table->string('technology_url')->nullable();            
         $table->string('technology_slug');
         $table->string('technology_tag')->nullable();
         $table->integer('technology_popular')->nullable();
         $table->integer('technology_status')->nullable();
         $table->datetime('technology_future_post')->nullable();
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
        Schema::dropIfExists('technologies');
    }
}
