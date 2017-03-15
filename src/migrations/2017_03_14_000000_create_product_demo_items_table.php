<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDemoItemsTable extends Migration
{
    public function up()
    {
        Schema::create('laracms_product', function(Blueprint $t)
        {
            $t->increments('id')->unsigned();
            $t->string('product_name', 200);
            $t->string('product_amount', 10);
            $t->string('product_desc', 500);
            $t->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('laracms_product');
    }
}