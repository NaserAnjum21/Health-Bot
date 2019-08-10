<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('point1')->nullable();
            $table->string('point2')->nullable();
            $table->string('point3')->nullable();
            $table->string('point4')->nullable();
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
        Schema::dropIfExists('admin_post');
    }
}
