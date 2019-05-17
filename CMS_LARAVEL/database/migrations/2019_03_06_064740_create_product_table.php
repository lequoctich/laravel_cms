<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name', 255);
                $table->string('slug', 255)->nullable();
                $table->longText('description')->nullable();
                $table->longText('description_lang')->nullable();
                $table->string('key_word', 10)->nullable();
                $table->longText('content')->nullable();
                $table->longText('content_lang')->nullable();
                $table->integer('price')->length(25)->default(0);
                $table->integer('sale')->length(25)->nullable();
                $table->integer('category_id')->length(10)->nullable();
                $table->integer('amount')->length(25)->nullable();
                $table->integer('delete_flag')->length(2)->default(0);
                $table->integer('sort')->length(10)->nullable();
                $table->integer('local')->length(10)->nullable();
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
        Schema::dropIfExists('product');
    }
}
