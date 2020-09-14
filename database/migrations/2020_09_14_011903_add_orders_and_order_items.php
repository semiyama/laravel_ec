<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersAndOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //注文テーブル
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->comment('識別ID');
            $table->string('name', 255)->comment('名前');
            $table->string('name_kana', 255)->comment('名前（カナ）');
            $table->string('zip')->comment('郵便番号');
            $table->tinyInteger('pref')->comment('都道府県');
            $table->string('address1', 255)->comment('住所1');
            $table->string('address2', 255)->comment('住所2');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('tel', 255)->comment('電話番号');
            $table->string('memo', 255)->comment('管理用メモ');
            $table->integer('deliv_price')->comment('送料');
            $table->timestamps();
        });

        //注文アイテムテーブル
        Schema::create('order_items', function (Blueprint $table) {
            $table->id()->comment('識別ID');
            $table->integer('item_id')->comment('商品ID');
            $table->integer('price')->comment('単価');
            $table->integer('num')->comment('個数');
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
}
