<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignid('dept_staff_name')->nullable()->constrained('users');
            $table->foreignid('staff_prev_dept')->nullable()->constrained('departments');
            $table->foreignid('staff_new_dept')->nullable()->constrained('departments');
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
        Schema::dropIfExists('department_histories');
    }
}
