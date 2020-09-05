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
            $table->integer('price_total');
            $table->integer('total_berat')->nullable();
            $table->integer('total_satuan')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('statusPesanan_id');
            $table->unsignedBigInteger('paymentStatus_id');
            $table->unsignedBigInteger('paymentMethod_id');
            $table->timestamps();
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('paket_id')->references('id')->on('pakets');
            $table->foreign('statusPesanan_id')->references('id')->on('status_pesanans');
            $table->foreign('paymentStatus_id')->references('id')->on('payment_statuses');
            $table->foreign('paymentMethod_id')->references('id')->on('payment_methods');
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
