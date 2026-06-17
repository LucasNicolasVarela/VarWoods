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
        Schema::table('blogs', function (Blueprint $table) {

            $table->string('img')->nullable()->after('fecha_publicacion');

            $table->text('img_description')
                ->nullable()
                ->after('img');

        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->dropColumn('img_description');
            $table->dropColumn('img');

        });
    }
};
