<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AmazonProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('catalog_id');
            $table->string('asin'); //sku 码
            $table->string('name');
            $table->string('url');
            $table->string('rank'); // 排名
            $table->integer('up_or_down'); //升还是降了
            $table->integer('up_or_down_diff');  //升降差异
            $table->string('keywords');
            $table->boolean('is_active');  //是否追踪，不追踪的，其他数据可以不要，甚至可以删除
            $table->string('image');
            $table->integer('step');
            $table->integer('d1');
            $table->integer('d2');
            $table->integer('d3');
            $table->integer('d4');
            $table->integer('d5');
            $table->dateTime('update_time');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('amazon_products');
    }
}
