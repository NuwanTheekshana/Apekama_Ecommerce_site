<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('item_token');
            $table->string('item_code');
            $table->string('item_name');
            $table->decimal('item_price');
            $table->string('item_qty');
            $table->string('main_cate_code');
            $table->string('item_image');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('order_item_tbls');
    }
}
