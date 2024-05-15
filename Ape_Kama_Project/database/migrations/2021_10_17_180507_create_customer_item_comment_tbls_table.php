<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerItemCommentTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_item_comment_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('customer_comment');
            $table->string('status')->default("Pending");
            $table->boolean('remove_status')->default(0);
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
        Schema::dropIfExists('customer_item_comment_tbls');
    }
}
