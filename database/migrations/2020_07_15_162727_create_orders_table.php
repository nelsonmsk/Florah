<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
		    $table->date('orderDate');
		    $table->string('sku');
			$table->text('items');
		    $table->float('subTotal');
		    $table->string('sRequest');	
		    $table->string('status');			
			$table->unsignedBigInteger('user_id');			
            $table->timestamps();
        });
			Schema::table('orders', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('orders', function($table) {
			$table->dropForeign(['user_id']);
			$table->dropColumn('user_id');
		});	
        Schema::dropIfExists('orders');
    }
}
