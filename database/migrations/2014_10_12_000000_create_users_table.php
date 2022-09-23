<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //server增删
            $table->increments('id');
            $table->unsignedInteger('pid')->nullable()->comment('如果是主账户则为null，子账户则为主账户id');
            $table->string('account')->comment('登陆账号');
            $table->string('mobile')->unique()->nullable()->comment('手机号可用于登陆');
            $table->string('password');
            $table->string('name')->default('')->comment('法人姓名');
            $table->string('id_number')->default('')->comment('法人身份证号');
            $table->string('business_license_path')->default('')->comment('营业执照路径');
            $table->string('business_license_number')->default('')->comment('营业执照号');
            $table->string('id_card_front')->default('')->comment('身份证号正面');
            $table->string('id_card_back')->default('')->comment('身份证号反面');
            $table->string('ip_white_list')->default('')->comment('ip白名单，在这个白名单内的ip可以接口或者标准协议提交短信，多个ip,分隔');
            $table->unsignedTinyInteger('charge_type')->default(0)->comment('计费类型 0-提交计费 1-成功计费');//server
            $table->unsignedTinyInteger('refund_type')->nullable()->comment('退费类型 1-立即返还 2-手动返还 3-3天后返还');//server
            //用户锁定则无法登陆客户端，并且无法创建用户通道链接，也无法发送短信（包含各种方式），排队短信全部拦截
            $table->boolean('is_locked')->default(0)->comment('是否锁定 0-不是 1-是');//server
            $table->string('lock_reason')->default('')->comment('锁定原因');
            $table->unsignedTinyInteger('authenticating_state')->default(0)->comment('认证状态 0-未提交 1-待审核 2-通过 3-驳回 4-免审');//通过server
            $table->string('examine_reject_reason')->default('')->comment('审核拒绝原因');
            $table->unsignedBigInteger('balance')->comment('余额，单位毫，即小数点后四位');//server
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
