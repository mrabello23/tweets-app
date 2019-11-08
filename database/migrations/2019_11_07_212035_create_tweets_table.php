<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tweet')->nullable(true);
            $table->dateTime('tweet_data')->nullable(true);
            $table->string('hashtag', 150)->nullable(true);
            $table->unsignedInteger('seguidores')->nullable(true);
            $table->string('localidade', 150)->nullable(true);
            $table->string('lingua', 50)->nullable(true);
            $table->string('usuario_nome', 200)->nullable(true);
            $table->string('usuario_apelido', 200)->nullable(true);
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
        Schema::dropIfExists('tweets');
    }
}
