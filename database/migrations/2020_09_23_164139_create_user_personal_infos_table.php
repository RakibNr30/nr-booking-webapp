<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personal_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('designation')->nullable();
			$table->longText('about')->nullable();
			$table->string('mobile_no')->nullable();
			$table->string('personal_email')->nullable();
			$table->timestamp('dob')->nullable();
			$table->string('blood_group')->nullable();
			$table->string('gender')->nullable();
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
        Schema::dropIfExists('user_personal_infos');
    }
}
