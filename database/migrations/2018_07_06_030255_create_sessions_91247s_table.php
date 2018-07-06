<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessions91247sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions_91247', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gym_users_id');
            $table->date('date');
            $table->string('exercise_name/type', 55);
            $table->integer('number_of_sets');
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
        Schema::dropIfExists('sessions_91247s');
    }
}
