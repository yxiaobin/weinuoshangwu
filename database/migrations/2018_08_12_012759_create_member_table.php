<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');

            // 所属用户名
            $table->string('username')->nullable();
            //所属公司
            $table->string('company')->nullable();
//            所属头像
            $table->string('image')->nullable();
//            所属姓名
            $table->string('name')->nullable();
            //所属密码
            $table->string('password','255');
//            所属职务
            $table->string('job')->nullable();
//            所属个人简介
            $table->string('motto')->nullable();
//              所属状态 0 代表普通用户 1代表管理员
            $table->string('rank')->nullable();
//            被推荐顺序
            $table->string('sortnum')->nullable();

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
        Schema::dropIfExists('member');
    }
}
