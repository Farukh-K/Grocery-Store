<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStringsOfChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strings_of_checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('check_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('amount_of_product_in_check', 5, 2);
            $table->decimal('price_of_product',5,2);
            $table->timestamps();


            $table->index('check_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strings_of_checks');
    }
}
