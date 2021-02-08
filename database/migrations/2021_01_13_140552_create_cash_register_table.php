<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_registers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("initial_value", 8, 2);
            $table->boolean("open_close");
            $table->integer('sales_amount');
            $table->foreignId('opening_user_id')->constrained('users');
            $table->foreignId('closing_user_id')->constrained('users');
            $table->dateTime('date')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_registers');
        //$table->foreignId('opening_user_id')->constrained()->onDelete('cascade');
       // $table->foreignId('closing_user_id')->constrained()->onDelete('cascade');
    }
}
