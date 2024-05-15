<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraImageTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_image_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_ex_image_token');
            $table->string('item_ex_image_path');
            $table->string('added_user');
            $table->string('add_date');
            $table->string('img_status')->default(1);
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
        Schema::dropIfExists('extra_image_tbls');
    }
}
