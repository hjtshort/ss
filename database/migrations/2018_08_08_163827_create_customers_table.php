<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Customer_name');
            $table->boolean('Customer_sex');
            $table->string('Customer_phone');
            $table->string('Customer_email')->unique();
            $table->string('Customer_address');
            $table->unsignedInteger('Ctv_id');
            $table->foreign('Ctv_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('Network_id')->nullable();
            $table->foreign('Network_id')->references('id')->on('networks')
                ->onDelete('cascade');
            $table->integer('Manager_id')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
