<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('sandbox_username')->nullable();
            $table->longText('sandbox_password')->nullable();
            $table->longText('sandbox_secret')->nullable();
            $table->longText('sandbox_certificate')->nullable();
            $table->longText('sandbox_app_id')->nullable();
            $table->longText('currency')->nullable();
            $table->longText('stripe_key')->nullable();
            $table->longText('stripe_secret')->nullable();
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
        Schema::dropIfExists('apis');
    }
}
