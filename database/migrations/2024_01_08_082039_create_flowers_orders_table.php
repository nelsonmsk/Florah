<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers_orders', function (Blueprint $table) {
            $table->bigIncrements('id');        
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('flower_id');
            $table->timestamps();
        });
		Schema::table('flowers_orders', function($table) {
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('flower_id')->references('id')->on('flowers')->onDelete('cascade');	
		});	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('flowers_orders', function($table) {
			$table->dropForeign(['order_id']);
			$table->dropColumn('order_id');
			$table->dropForeign(['flower_id']);
			$table->dropColumn('flower_id');
		});
        Schema::dropIfExists('flowers_orders');
    }
}
