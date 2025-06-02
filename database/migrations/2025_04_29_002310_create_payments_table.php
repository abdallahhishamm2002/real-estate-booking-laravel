<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name_on_card')->nullable();
            $table->string('card_last_four')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_status')->default('pending'); // success, failed
            $table->string('stripe_payment_id')->nullable(); // optional: save stripe payment id
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
