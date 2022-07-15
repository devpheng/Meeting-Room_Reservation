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
            $table->string('number');
            $table->string('model');
            $table->integer('driver_id');
            $table->string('plat_number')->nullable();
            $table->string('capacity')->nullable();
            $table->string('image')->nullable();
            $table->string('working_time_from')->nullable();
            $table->string('working_time_to')->nullable();
            $table->string('rest_day')->nullable();
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
