<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanatoriumRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanatorium_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatorium_id')->nullable()->constrained('sanatoriums')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();

            $table->integer('count_adults');
            $table->integer('count_children');
            $table->integer('price')->nullable();
            $table->integer('count')->nullable();
            $table->integer('free_places')->nullable();

            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanatorium_rooms');
    }
}
