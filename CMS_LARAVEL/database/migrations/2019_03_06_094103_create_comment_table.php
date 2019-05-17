<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'comment', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('id_page', 255);
                $table->string('id_user', 255)->nullable();
                $table->string('child_comment', 255)->nullable();
                $table->longText('contain')->nullable();
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
        Schema::dropIfExists('comment');
    }
}
