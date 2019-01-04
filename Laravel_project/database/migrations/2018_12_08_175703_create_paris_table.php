<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paris', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('teams_id');
            $table->unsignedInteger('matches_id');
            $table->integer('amount');
            $table->foreign('matches_id')
                    ->references('id')
                    ->on('matches')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
             $table->foreign('teams_id')
                    ->references('id')
                    ->on('teams')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('paris');
    }
}
