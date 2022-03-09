<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_locales', function (Blueprint $table) {
            $table->id();
            $table->enum('locale', ['en', 'th'])->default('en');
            $table->string('name');
            $table->mediumText('slug');
            $table->string('meta_title');
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_locales');
    }
}
