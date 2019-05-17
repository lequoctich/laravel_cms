<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'category', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name', 255);
                $table->string('slug', 255)->nullable();
                $table->longText('description')->nullable();
                $table->longText('description_lang')->nullable();
                $table->string('parent_id', 10)->default(0);
                $table->string('key_word', 10)->nullable();
                $table->longText('content')->nullable();
                $table->longText('content_lang')->nullable();
                $table->string('image', 10)->nullable();
                $table->string('delete_flag', 10)->default(0);
                $table->string('menu_slug', 6)->default(0);
                $table->integer('sale')->length(20)->default(0);
                $table->integer('active_content_flg')->length(1)->default(0);
                $table->string('menu_id')->length(20)->nullable();
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
        Schema::dropIfExists('category');
    }
}
