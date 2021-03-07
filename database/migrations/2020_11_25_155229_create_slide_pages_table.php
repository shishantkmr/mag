<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slide_id')->unsigned()->nullable();
            // $table->foreign('slide_id')->references('id')->on('slide_pages');          
            $table->string('slidepage_title');
            $table->string('slidepage_text');
            $table->string('slidepage_img1')->nullable();
            $table->string('slidepage_img2')->nullable();
            $table->string('slidepage_img3')->nullable();
            $table->text('slidepage_news')->nullable();
            $table->string('slidepage_url')->nullable();            
            $table->string('slidepage_slug');
            $table->string('slidepage_tag')->nullable();
            $table->integer('slidepage_popular')->nullable();
            $table->integer('slidepage_status')->nullable();
            $table->datetime('slidepage_future_post')->nullable();
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
        Schema::dropIfExists('slide_pages');
    }
}
