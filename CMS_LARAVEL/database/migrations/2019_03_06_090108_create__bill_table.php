<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'bill', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name', 255)->default(0);
                $table->string('address', 255);
                $table->string('email', 255)->nullable();
                $table->integer('phone')->length(20);
                $table->integer('sale')->length(20);
                $table->integer('total_price')->length(25);
                $table->longText('note')->nullable();  
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
        Schema::dropIfExists('bill');
    }
}
