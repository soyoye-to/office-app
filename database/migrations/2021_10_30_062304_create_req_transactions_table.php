<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_num')->nullable();
            // $table->foreignid('requisition_title')->nullable()->constrained('payment_heads');
            $table->integer('amount_approved')->nullable();
            $table->integer('amount_paid')->nullable();
            $table->date('payment_date')->nullable();
            $table->foreignid('requisition_id')->nullable()->constrained('requisitions');
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
        Schema::dropIfExists('req_transactions');
    }
}
