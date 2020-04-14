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
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id('IDproduct')->nullable(false)->autoIncrement();
            $table->timestamps();
            $table->integer('IDparent')->comment('IDproduct of parent item');
            $table->string('sku',31);
            $table->string('code',32)->nullable(false);
            $table->string('description');
            $table->string('technicalDescription');
            $table->string('name');
            $table->string('variantName',128);
            $table->integer('variantSort')->nullable(false);
            $table->float('stock',20,2);
            $table->float('price',20,6);
            $table->float('saleAmount',20,6);
            $table->integer('hidden')->nullable(false);
            $table->string('ean',13);
            $table->string('tags');
            $table->string('url',128);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_product');
    }
}
