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
            $table->text('tweet');
            $table->dateTime('tweet_data');
            $table->string('hashtag', 100);
            $table->unsignedInteger('seguidores');
            $table->string('localidade', 150);
            $table->string('lingua', 15);
            $table->string('usuario_nome', 150);
            $table->string('usuario_apelido', 150);
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
