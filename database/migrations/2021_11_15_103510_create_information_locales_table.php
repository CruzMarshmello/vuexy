<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_locales', function (Blueprint $table) {
            $table->id();
            $table->enum('locale', ['en','th'])->default('en');
            $table->string('title');
            $table->mediumText('slug');
            $table->text('description')->nullable();
            $table->string('meta_title');
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
            $table->integer('information_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_locales');
    }
}
