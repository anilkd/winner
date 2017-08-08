<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('winners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id');
            $table->string('rj_name');
            $table->date('date');
            $table->integer('contest_id');
            $table->string('winner_name');
            $table->string('phone_no');
            $table->string('email')->nullable();
            $table->string('area_name')->nullable();
            $table->date('gift_issued_date')->nullable();
            $table->integer('active')->nullable();
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
        Schema::drop('winners');
    }
}
