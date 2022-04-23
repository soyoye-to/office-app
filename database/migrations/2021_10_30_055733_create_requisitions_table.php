<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->date('application_date')->nullable();
            $table->foreignid('req_title')->nullable()->constrained('payment_heads');
            $table->string('purpose')->nullable();
            $table->integer('amount_raised')->nullable();
            $table->foreignid('raised_by_id')->nullable()->constrained('users');
            $table->foreignid('for_user')->nullable()->constrained('users');
            $table->foreignid('for_vendor')->nullable()->constrained('vendors');
            $table->string('status')->nullable();
            $table->string('level_1_status')->nullable();
            $table->string('level_2_status')->nullable();
            $table->string('level_3_status')->nullable();
            $table->string('level_1_comment')->nullable();
            $table->string('level_2_comment')->nullable();
            $table->string('level_3_comment')->nullable();
            $table->integer('level_1_amount_appr')->nullable();
            $table->integer('level_2_amount_appr')->nullable();
            $table->integer('level_3_amount_appr')->nullable();
            $table->date('final_appr_date')->nullable();


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
        Schema::dropIfExists('requisitions');
    }
}
