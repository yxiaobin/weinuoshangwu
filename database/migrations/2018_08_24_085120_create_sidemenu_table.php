<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidemenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidemenu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('preid')->nullable();
            $table->string('rank')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('num')->nullable();
            //负责人
            $table->string('member')->nullable();
            //负责人电话
            $table->string('memberphone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidemenu');
    }
}
