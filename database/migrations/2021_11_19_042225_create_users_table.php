<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->string('phone');
            $table->string('device_token')->nullable();

//            $table->integer('days')->nullable();
//            $table->dateTime('from_date')->nullable();
//            $table->dateTime('to_date')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
//            $table->string('iin')->nullable();
//            $table->string('nationality')->nullable();
//            $table->dateTime('validity')->nullable();
//            $table->string('passport')->nullable();
//            $table->dateTime('phone_verified_at')->nullable();

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
        Schema::dropIfExists('users');
    }
}
