<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('problem');
            $table->text('answer1');
            $table->text('answer2');
            $table->text('answer3')->nullable();
            $table->text('answer4')->nullable();
            // correct a, b, c, d
            $table->string('correct', 2);
            $table->text('explain')->nullable();
            // Level easy = 1, medium = 2, hard = 3
            $table->string('level', 2)->nullable();
            $table->integer('group_id');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
