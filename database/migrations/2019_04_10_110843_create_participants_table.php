<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('street');
            $table->string('npa');
            $table->string('email');
            $table->boolean('canSendNewsletter');
            $table->boolean('isAllAnswerCorrect')->nullable();
            $table->integer('nbrCorrectAnswer')->nullable();
            $table->string('hashAnswers');
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
        Schema::dropIfExists('participants');
    }
}
