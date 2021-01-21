<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("value", 8, 2);
            $table->foreignId('user_id')->constrained('users');
            //$table->foreignId('client_id')->constrained('clients');
            $table->integer('sale_type');//1 a vista 2 a prazo
            $table->foreignId('cash_registers_id')->constrained('cash_registers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
