<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('_company_id');
            $table->integer('price');
            $table->integer('stock');
            $table->text('comment');
            $table->text('img_path');
            $table->timestamps();

            //外部キー制約の設定
            $table->foreign('_company_id')->references('id')->on('_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_products');
    }
}
