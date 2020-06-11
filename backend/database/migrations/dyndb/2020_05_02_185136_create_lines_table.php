<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->nullable();
            $table->text('description')->nullable();
            $table->double('units', 15, 8)->nullable();
            $table->double('price_unit', 15, 8)->nullable();
            $table->double('tax', 15, 8)->nullable();
            $table->double('discount', 15, 8)->nullable();
            $table->morphs('lineable');
            $table->unsignedBigInteger('product_id')->nullable();
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
        Schema::dropIfExists('lines');
    }
}
