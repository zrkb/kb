<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKBTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kb_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('kb_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kb_topic_id')->unsigned();
            $table->string('question');
            $table->longText('answer');
            $table->string('slug')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('kb_topic_id')
                ->references('id')
                ->on('kb_topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kb_questions');
        Schema::dropIfExists('kb_topics');
    }
}
