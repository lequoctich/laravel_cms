<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'menus', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name');
                $table->integer('local')->length(2)->default(0);
                $table->integer('sort')->length(2)->default(0);
                $table->integer('role')->length(2)->nullable();
                $table->string('slug')->length(255)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
