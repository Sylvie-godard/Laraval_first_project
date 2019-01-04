<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scoreBoard')->nullable()->default(null);
            $table->unsignedInteger('winner_id')->nullable()->default(null);
            $table->unsignedInteger('teams1_id');
            $table->unsignedInteger('teams2_id');
            $table->string('placement');
            $table->integer('temperature');
            $table->integer('nb_faults');
            $table->foreign('winner_id')
                    ->references('id')
                    ->on('teams')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('teams1_id')
                    ->references('id')
                    ->on('teams')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    $table->foreign('teams2_id')
                    ->references('id')    
                    ->on('teams')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });

/*         Schema::table('matches', function (Blueprint $table) {
        });
 */    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
