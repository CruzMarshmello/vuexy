<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->mediumText('location');
            $table->string('full_name');
            $table->longText('address_1');
            $table->longText('address_2')->nullable();
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->integer('postal_code');
            $table->string('country');
            $table->string('telephone');
            $table->timestamps();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_books');
    }
}
