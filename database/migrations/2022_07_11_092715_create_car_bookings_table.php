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
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('mac_adress');
            $table->timestamp('pick_up_time')->nullable();
            $table->timestamp('drop_off')->nullable();
            $table->string('purpose');
            $table->string('booker');
            $table->integer('department_id');
            $table->integer('car_id');
            $table->timestamp('approved_at')->nullable();
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('car_bookings');
    }
};
