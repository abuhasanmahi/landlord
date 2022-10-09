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
            $table->double('rent',8,2)->unsigned()->default(0);
            $table->double('electricity_bill',8,2)->unsigned()->default(0);
            $table->double('water_bill',8,2)->unsigned()->default(0);
            $table->double('gas_bill',8,2)->unsigned()->default(0);
            $table->double('trash_van',8,2)->unsigned()->default(0);
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
