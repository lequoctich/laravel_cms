<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create(
            'users', function (Blueprint $table) {
                $table->integer('id')->autoIncrement()->length(10);
                $table->string('name', 255)->nullable();
                $table->tinyInteger('gender')->length(4)->unsigned()->default(0);
                $table->date('birth_on')->nullable();
                $table->string('postcode', 8)->nullable();
                $table->string('prefecture', 255)->nullable();
                $table->string('address1', 255)->nullable();
                $table->string('address2', 255)->nullable();
                $table->tinyInteger('area_id')->length(10)->nullable()->unsigned();
                $table->string('tel', 15)->nullable();
                $table->string('mobile', 15)->nullable();
                $table->string('company_name', 255)->nullable();
                $table->string('company_tel', 15)->nullable();
                $table->string('account', 255);
                $table->string('password', 255);
                $table->text('mail')->nullable();
                $table->tinyInteger('status')->length(5)->unsigned()->default(0);
                $table->tinyInteger('role')->length(5)->unsigned()->default(0);
                $table->string('hash', 255)->nullable()->default(null);
                $table->tinyInteger('penalty_level')->length(5)->nullable()->default(0);
                $table->datetime('penalty_at')->nullable();
                $table->text('remarks')->nullable();
                $table->tinyInteger('is_deleted')->length(4)->unsigned()->default(0);
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
        Schema::dropIfExists('users');
    }
}
