<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('slug');
            $table->text('location')->nullable();
            $table->string('continent')->nullable();
            $table->longText('about')->nullable();
            $table->text('room_type')->nullable();
            $table->text('board_type')->nullable();
            $table->string('checkin_time')->nullable();
            $table->string('checkout_time')->nullable();
            $table->longText('others_feature')->nullable();
            $table->unsignedDouble('cost_per_night')->nullable();
            $table->boolean('is_open')->nullable()->default(true);
            $table->unsignedBigInteger('view')->nullable()->default(0);
            $table->commonFields();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
