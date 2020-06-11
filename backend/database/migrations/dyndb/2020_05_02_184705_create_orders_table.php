<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('code', 20)->nullable();
            $table->string('name', 255)->nullable();
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('status', 75)->nullable();
            $table->string('currency', 15)->nullable();
            $table->string('tdtype', 100)->nullable();
            $table->double('tax', 15, 8)->nullable();
            $table->double('discount', 15, 8)->nullable();
            $table->json('address_info')->nullable();
            $table->json('contact_info')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->unsignedBigInteger('quote_id')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
