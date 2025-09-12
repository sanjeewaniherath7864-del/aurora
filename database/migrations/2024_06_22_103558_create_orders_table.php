<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //create order forien key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('vehicle_no')->nullable(true);
            $table->string('status')->default("pending");
            $table->timestamp("place_at");
            $table->string('distace_traveled')->default('0 km');
            $table->string('address')->nullable(true);
            $table->string('mobile_no')->nullable(true);
            $table->string('customer_name')->nullable(true);
            $table->string('bank_card_no')->nullable(true);
            $table->double('price')->nullable(true);
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('shipped_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
