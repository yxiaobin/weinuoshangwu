<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->increments('id');
//            页面名称
            $table->string('name')->nullable();
//            业内标题
            $table->string('title')->nullable();
//            页内封面
            $table->string('image')->nullable();
//            页内电话
            $table->string('phone')->nullable();
//            页内内容
            $table->longText('content')->nullable();
//            页面别名
            $table->longText('linkname')->nullable();
//            页面超链接
            $table->string('link')->nullable();
            //样式
            $table->string('status')->default(0);
            //负责人
            $table->string('member')->nullable();
            //负责人电话
            $table->string('memberphone')->nullable();
            //页面类型
            $table->string('kind')->nullable();
//                列表类型的内容
            $table->string('kindcontent')->nullable();

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
        Schema::dropIfExists('page');
    }
}
