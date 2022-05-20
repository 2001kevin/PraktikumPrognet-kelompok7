<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('timeout');
            $table->string('address');
            $table->string('regency');
            $table->string('province');
            $table->integer('total');
            $table->integer('shipping_cost');
            $table->integer('sub_total');
            $table->integer('user_id');
            $table->integer('courier_id');
            $table->string('prof_of_payment');
            $table->string('status');
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
        Schema::dropIfExists('transactions');
    }
}
