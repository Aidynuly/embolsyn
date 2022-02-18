<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanatoriumComfortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanatorium_comforts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatorium_room_id')->constrained('sanatorium_rooms')->cascadeOnDelete();
            $table->foreignId('comfort_id')->constrained('comforts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanatorium_comforts');
    }
}
