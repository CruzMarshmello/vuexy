<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();
            $table->enum('status', ['Disabled', 'Enabled'])->default('Enabled');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('percentage')->nullable();
            $table->timestamps();
            $table->integer('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
