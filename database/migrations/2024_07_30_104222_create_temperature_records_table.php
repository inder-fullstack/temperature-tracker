<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperatureRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('temperature_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->dateTime('recorded_at');
            $table->decimal('temperature', 5, 2);
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unique(['city_id', 'recorded_at']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temperature_records');
    }
}
