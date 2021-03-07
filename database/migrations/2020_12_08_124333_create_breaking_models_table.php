<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breaking_news', function (Blueprint $table) {
            $table->id();
            $table->string('breakingnews_title');
            $table->text('breakingnews_text');
            $table->string('breakingnews_img')->nullable();
            $table->string('breakingnews_url')->nullable();            
            $table->string('breakingnews_slug')->nullable(); 
            $table->string('breakingnews_tag')->nullable();
            $table->integer('breakingnews_popular')->nullable();
            $table->integer('breakingnews_status')->nullable();
            $table->datetime('breakingnews_future_post')->nullable();
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
        Schema::dropIfExists('breaking_news');
    }
}
