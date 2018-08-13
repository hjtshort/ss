<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manages', function (Blueprint $table) {
            $table->unsignedInteger('Employee_id');
            $table->unsignedInteger('Customer_id');
            $table->boolean('sendmail')->default(0);
            $table->primary(['Employee_id','Customer_id']);
            $table->foreign('Employee_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('Customer_id')->references('id')->on('customers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('manages');
    }
}
