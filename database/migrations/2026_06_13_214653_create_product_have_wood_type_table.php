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
        Schema::create('product_have_wood_type', function (Blueprint $table) {

            $table->unsignedBigInteger('product_fk');
            $table->unsignedSmallInteger('wood_type_fk');

            $table->timestamps();

            $table->foreign('product_fk')
                ->references('id')
                ->on('product');

            $table->foreign('wood_type_fk')
                ->references('wood_type_id')
                ->on('wood_types');

            $table->primary([
                'product_fk',
                'wood_type_fk',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_have_wood_type');
    }
};
