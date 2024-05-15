<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->string('item_token');
            $table->string('cust_name');
            $table->string('email');
            $table->string('mob_no');
            $table->string('address_type');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('payment_type');
            $table->string('order_status');
            $table->datetime('order_date');
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
        Schema::dropIfExists('order_tbls');
    }
}
