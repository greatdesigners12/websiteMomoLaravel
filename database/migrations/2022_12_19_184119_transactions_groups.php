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
        Schema::create('transactions_groups', function (Blueprint $table) {
            $table->id();
            $table->text('invoice');
            $table->bigInteger('total_price');
            $table->timestamp('data_transaction');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->text('snap_token');
            $table->bigInteger('shipping_price');
            $table->text('no_resi');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_groups');
    }
        //
    
};
