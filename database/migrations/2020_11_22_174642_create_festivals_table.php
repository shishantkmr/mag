<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
           $table->id();
            $table->string('festival_title');
            $table->text('festival_text');
            $table->string('festival_img')->nullable();
            $table->string('festival_url')->nullable();            
            $table->string('festival_slug');
            $table->string('festival_tag')->nullable();
            $table->integer('festival_popular')->nullable();
            $table->integer('festival_status')->nullable();
            $table->datetime('festival_future_post')->nullable();
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
        Schema::dropIfExists('festivals');
    }
}
