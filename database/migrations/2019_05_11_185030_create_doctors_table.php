<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_doctor')->default(false);
            $table->string('work_address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('speciality')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('visiting_hours')->nullable();
            $table->string('work_address')->nullable();
            $table->int('rate_sum')->default(0);
            $table->float('rate_count')->default(0.0001);
            $table->string('profile_pic')->nullable();
            $table->int('fee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
