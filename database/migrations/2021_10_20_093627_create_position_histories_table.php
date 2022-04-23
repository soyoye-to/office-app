<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignid('pos_staff_name')->nullable()->constrained('users');
            $table->foreignid('staff_prev_pos')->nullable()->constrained('positions');
            $table->foreignid('staff_new_pos')->nullable()->constrained('positions');
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
        Schema::dropIfExists('position_histories');
    }
}
