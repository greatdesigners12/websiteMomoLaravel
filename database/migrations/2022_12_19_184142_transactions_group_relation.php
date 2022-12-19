<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_group_relation', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('transaction_group_id');
        $table->unsignedBigInteger('transaction_product_id');
        $table->foreign('transaction_product_id')->references('id')->on('transactions_products')->onDelete('cascade');
        $table->foreign('transaction_group_id')->references('id')->on('transactions_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_group_relation');
    }
};
