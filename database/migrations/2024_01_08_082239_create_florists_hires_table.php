<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloristsHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('florists_hires', function (Blueprint $table) {
            $table->bigIncrements('id');      
			$table->unsignedBigInteger('hire_id');
			$table->unsignedBigInteger('florist_id');
            $table->timestamps();
        });
		Schema::table('florists_hires', function($table) {
			$table->foreign('hire_id')->references('id')->on('hires')->onDelete('cascade');
			$table->foreign('florist_id')->references('id')->on('florists')->onDelete('cascade');	
		});	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('florists_hires', function($table) {
			$table->dropForeign(['hire_id']);
			$table->dropColumn('hire_id');
			$table->dropForeign(['florist_id']);
			$table->dropColumn('florist_id');
		});
        Schema::dropIfExists('florists_hires');
    }
}
