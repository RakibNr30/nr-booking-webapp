<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResidentialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_residential_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->text('address_line_1')->nullable();
			$table->text('address_line_2')->nullable();
			$table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('user_residential_infos');
    }
}
