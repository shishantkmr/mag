<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('study_title');
            $table->text('study_text');
            $table->string('study_img')->nullable();
            $table->string('study_url')->nullable();            
            $table->string('study_slug');
            $table->string('study_tag')->nullable();
            $table->integer('study_popular')->nullable();
            $table->integer('study_status')->nullable();
            $table->datetime('study_future_post')->nullable();
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
        Schema::dropIfExists('studies');
    }
}
