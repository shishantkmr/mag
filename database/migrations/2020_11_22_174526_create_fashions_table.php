<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFashionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fashions', function (Blueprint $table) {
            $table->id();
            $table->string('fashion_title');
            $table->text('fashion_text');
            $table->string('fashion_img')->nullable();
            $table->string('fashion_url')->nullable();            
            $table->string('fashion_slug');
            $table->string('fashion_tag')->nullable();
            $table->integer('fashion_popular')->nullable();
            $table->integer('fashion_status')->nullable();
            $table->datetime('fashion_future_post')->nullable();
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
        Schema::dropIfExists('fashions');
    }
}
