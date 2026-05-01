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
        Schema::create('blogs', function (Blueprint $table) {

        /*
            # Blogs
            - id                     BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
            - title                  VARCHAR(100)
            - content                TEXT
            - resumen                TEXT
            - category_name          VARCHAR(50)
            - fecha_publicacion      DATE
        */
            $table->id();
            $table->string('title', 100);
            $table->text('contenido_blog');
            $table->text('resumen');
            $table->string('category_name', 50);
            $table->date('fecha_publicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
