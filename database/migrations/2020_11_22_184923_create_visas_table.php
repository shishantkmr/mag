<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_title');
            $table->text('visa_text');
            $table->string('visa_img')->nullable();
            $table->string('visa_url')->nullable();            
            $table->string('visa_slug');
            $table->string('visa_tag')->nullable();
            $table->integer('visa_popular')->nullable();
            $table->integer('visa_status')->nullable();
            $table->datetime('visa_future_post')->nullable();
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
        Schema::dropIfExists('visas');
    }
}
