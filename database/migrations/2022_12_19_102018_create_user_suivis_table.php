<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_suivis', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('course_id')->nullable();
            $table->unSignedBigInteger('lesson_id')->nullable();
            $table->unSignedBigInteger('user_id')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('user_suivis');
    }
};
