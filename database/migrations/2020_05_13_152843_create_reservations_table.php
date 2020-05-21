<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('payment_mode_id');
            $table->decimal('total_price', 8, 2);
            $table->timestamp('reservation_created')->nullable();
            $table->time('pickup_time');
            $table->date('pickup_date');
            $table->date('return_date');
            $table->integer('rent_days');
            $table->boolean('withdriver')->default(0);
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_mode_id')->references('id')->on('payment_modes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
