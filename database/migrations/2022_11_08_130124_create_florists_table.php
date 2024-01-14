<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('florists', function (Blueprint $table) {
            $table->bigIncrements('id');
		    $table->string('name');
		    $table->string('email')->unique();
		    $table->string('phone');
		    $table->text('bio');
		    $table->string('experience');
		    $table->string('speciality');
		    $table->integer('rates');			
			$table->string('username');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('florists');
    }
}
