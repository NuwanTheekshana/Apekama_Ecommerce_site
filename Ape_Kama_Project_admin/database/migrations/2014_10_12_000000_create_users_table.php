<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('fullname');
            $table->string('nic')->unique();
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->date('DOB');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            // $table->string('shipping_address_token');
            // $table->string('user_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remove_status')->default('0');
            $table->string('cust_type');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
