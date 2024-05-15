<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_name');
            $table->string('item_price');
            $table->string('item_qty');
            $table->string('item_option', 50);
            $table->string('item_image');
            $table->string('item_ex_image_token');
            $table->string('main_cate_code');
            $table->string('main_cate_name');
            $table->string('item_add_user_id');
            $table->string('item_add_date');
            $table->string('item_status')->default(1);
            $table->string('item_store_status')->default(1);
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
        Schema::dropIfExists('items');
    }
}
