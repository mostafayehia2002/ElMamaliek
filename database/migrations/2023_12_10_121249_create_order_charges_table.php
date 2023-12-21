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
        Schema::create('order_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->nullable()->constrained('product_charges','id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_id')->nullable()->constrained('payment_accounts')->nullOnDelete()->cascadeOnUpdate();
            $table->string('price');
            $table->string('process_number');
            $table->string('process_photo');
            $table->string('user_number');
            $table->enum('status',['تم الموافقة','بانتظارالموافقة'])->default('بانتظارالموافقة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_charges');
    }
};
