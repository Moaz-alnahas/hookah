<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('status_id')->constrained('order_status')->onDelete('cascade');
    $table->text('note')->nullable();
    $table->decimal('total_price', 10, 2)->default(0);
    $table->timestamp('delivery_time')->nullable();
    $table->timestamps();
});

    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
