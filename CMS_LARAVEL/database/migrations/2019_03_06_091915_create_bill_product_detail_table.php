<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'bill_product_detail', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('bill_id', 255)->default(0);
                $table->string('id_product', 255);
                $table->integer('amount')->length(10)->default(0);
                $table->integer('price')->length(25)->default(0); 
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_product_detail');
    }
}
