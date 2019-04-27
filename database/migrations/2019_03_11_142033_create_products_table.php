<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('name', 100)->index();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->enum('stock_type', ['product', 'ingredient'])->default('product');
            $table->tinyInteger('is_ingredient')->default(0);
            $table->float('price', 8, 2);
            $table->double('quantity_for_cut_stock', 8, 2);
            $table->integer('unit_id');
            $table->integer('category_id');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('products');
    }
}
