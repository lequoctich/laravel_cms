<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_detail', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('propety', 255)->default(0);//{'id_propety:'detail propety'}
                $table->integer('id_product')->length(10)->default(0);
                $table->string('image', 255)->nullable();//{url:'',alt:''}
                $table->string('image_1', 255)->nullable();//{url:'',alt:''}
                $table->string('image_2', 255)->nullable();//{url:'',alt:''}
                $table->string('image_3', 255)->nullable();//{url:'',alt:''}
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
        Schema::dropIfExists('product_detail');
    }
}
