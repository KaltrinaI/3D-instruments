<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments_info', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->unique();
            $table->text('details');
            $table->string('credit_card_number');
            $table->decimal('price', 10, 2);
            $table->string('object');
            $table->string('preview');
            $table->unsignedInteger('in_store');
            $table->unsignedInteger('instrument_family');
            $table->foreign('instrument_family')->references('id')->on('instruments_family')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('instruments_info');
    }
}
