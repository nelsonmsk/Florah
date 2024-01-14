<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouquets_orders', function (Blueprint $table) {
            $table->bigIncrements('id');        
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('bouquet_id');
            $table->timestamps();
        });
		Schema::table('bouquets_orders', function($table) {
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('bouquet_id')->references('id')->on('bouquets')->onDelete('cascade');	
		});	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('bouquets_orders', function($table) {
			$table->dropForeign(['order_id']);
			$table->dropColumn('order_id');
			$table->dropForeign(['bouquet_id']);
			$table->dropColumn('bouquet_id');
		});
        Schema::dropIfExists('bouquets_orders');
    }
}
