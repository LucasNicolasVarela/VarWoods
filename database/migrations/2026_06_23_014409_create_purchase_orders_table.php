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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id(); // número de orden de compra

            // usuario que realizó la compra
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            // nombre del cliente
            $table->string('client_name');
            // importe de la compra
            $table->integer('amount');
            // estado de la orden
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
