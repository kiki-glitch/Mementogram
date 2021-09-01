<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {

            
            $table->id();
            //$table->unsignedBigInteger('order_id')->change();
            //$table->unsignedBigInteger('product_id');
             $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade')->change();
             $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade')->change();
            /*$table->foreign('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreign('product_id')->constrained('products')->onDelete('cascade');*/
            $table->float('price');
            $table->integer('quantity');
            
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
        Schema::dropIfExists('order_items');
    }
}
