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
        /**
         * Esto nos permite editar la tabla product para agregarle nuevas columnas. Similar a ALTER TABLE en SQL.
         */
        Schema::table('product', function (Blueprint $table) {
            $table->string('img')->nullable();
            $table->string('img_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn(['img', 'img_description']);
        });
    }
};
