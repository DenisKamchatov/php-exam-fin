<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('thing_id')->unsigned();
            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('amount');
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
        Schema::dropIfExists('usage');
    }
}
