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
            $table->string('code')->nullable();
            $table->string('email')->nullable();
            $table->longText('shipping')->nullable();
            $table->longText('billing')->nullable();
            $table->longText('cart')->nullable();
            $table->longText('summary')->nullable();
            $table->string('transaction')->nullable();
            $table->string('brand')->nullable();
            $table->string('parcel')->nullable();
            $table->enum('status', ['Order Placed', 'Shipped', 'In Transit', 'In Dispatch', 'Waiting to be Picked Up', 'Have Been Signed'])->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
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
