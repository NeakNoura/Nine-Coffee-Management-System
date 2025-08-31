<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Optional: links to users table
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date');
            $table->time('time');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // Booking status
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};