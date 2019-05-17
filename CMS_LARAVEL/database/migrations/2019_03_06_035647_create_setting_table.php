<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'settings', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name', 255);//title, left footer, right footer, adverment...
                $table->longText('content')->nullable();
                $table->longText('content_language')->nullable();
                $table->string('delete_flag', 10)->default(0);
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
        Schema::dropIfExists('settings');
    }
}
