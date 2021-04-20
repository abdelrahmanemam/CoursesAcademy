<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('image_id')
                ->on('images')
                ->references('id');
            $table->text('description')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
                ->on('levels')
                ->references('id');
            $table->integer('hours');
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
