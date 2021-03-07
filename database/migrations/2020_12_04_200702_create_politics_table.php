<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politics', function (Blueprint $table) {
             $table->id();
            $table->string('politics_title');
            $table->text('politics_text');
            $table->string('politics_img')->nullable();
            $table->string('politics_url')->nullable();            
            $table->string('politics_slug');
            $table->string('politics_tag')->nullable();
            $table->integer('politics_popular')->nullable();
            $table->integer('politics_status')->nullable();
            $table->datetime('politics_future_post')->nullable();
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
        Schema::dropIfExists('politics');
    }
}
