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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('brand');
            $table->integer('driver_id');
            $table->string('plat_number')->nullable();
            $table->string('capacity')->nullable();
            $table->string('image')->nullable();
            $table->string('monday_time')->nullable();
            $table->string('tuesday_time')->nullable();
            $table->string('wednesday_time')->nullable();
            $table->string('thursday_time')->nullable();
            $table->string('friday_time')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cars');
    }
};
