<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_locales', function (Blueprint $table) {
            $table->id();
            $table->enum('locale', ['en','th'])->default('en');
            $table->string('name');
            $table->mediumText('slug')->nullable(); //
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable(); //
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->integer('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_locales');
    }
}
