<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
             $table->enum('status',['pending','processing','completed','decline'])->default('pending');
             $table->float('grand_total');
             $table->integer('item_count');
            $table->enum('payment_method',['cash','mpesa'])->default('cash');
            $table->string('name');
             $table->string('email');
            $table->string('phone_number');
            $table->string('location');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_returned')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
