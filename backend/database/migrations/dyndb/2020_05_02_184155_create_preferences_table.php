<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 255)->nullable();
            $table->string('vat', 20)->nullable();
            $table->json('address_info')->nullable();
            $table->json('contact_info')->nullable();
            $table->text('custom_header')->nullable();
            $table->text('custom_footer')->nullable();
            $table->unsignedBigInteger('account_id');
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
        Schema::dropIfExists('preferences');
    }
}
