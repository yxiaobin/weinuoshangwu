<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('des')->nullable();
            $table->string('keyword')->nullable();
            $table->string('biaoyu')->nullable();
            $table->string('fuwu')->nullable();
            $table->string('dingyue')->nullable();
            $table->string('allright')->nullable();
            $table->longText('shangqiao')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('member')->nullable();
            $table->longText('memberphone')->nullable();

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
        Schema::dropIfExists('web');
    }
}
