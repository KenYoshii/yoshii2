<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('_product_id');
            $table->timestamps();

            //外部キー制約の設定
            $table->foreign('_product_id')->references('id')->on('_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_sales');
    }
}
