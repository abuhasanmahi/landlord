<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('flat_name');
            $table->integer('rent')->unsigned();
            $table->integer('electricity_bill')->nullable()->unsigned();
            $table->integer('water_bill')->nullable()->unsigned();
            $table->integer('gas_bill')->nullable()->unsigned();
            $table->integer('trash_van')->nullable()->unsigned();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('flats');
    }
};
