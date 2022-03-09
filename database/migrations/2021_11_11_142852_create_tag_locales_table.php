<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_locales', function (Blueprint $table) {
            $table->id();
            $table->enum('locale', ['en','th'])->default('en');
            $table->string('name');
            $table->mediumText('slug');
            $table->string('meta_title');
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->integer('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_locales');
    }
}
