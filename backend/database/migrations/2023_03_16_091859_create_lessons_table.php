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
        Schema::create(
            'lessons',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->dateTime('time_start');
                $table->dateTime('time_end');
                $table->unsignedBigInteger('classroom_id');
                $table->foreign('classroom_id')->references('id')->on('classrooms')->constrained()->cascadeOnDelete();
                $table->softDeletes();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
