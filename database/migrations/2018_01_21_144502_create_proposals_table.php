<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unique();
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title');
            $table->string('file_address')->unique();
            $table->integer('user_level');
            $table->foreign('user_level')->references('id')->on('roles');
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('status_levels');
            $table->rememberToken();
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
        Schema::dropIfExists('proposals');
    }
}
