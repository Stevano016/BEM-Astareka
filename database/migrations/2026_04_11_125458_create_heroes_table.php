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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->default('The Digital Curator');
            $table->string('judul')->default('The Academic Vanguard');
            $table->string('judul_aksen')->nullable()->comment('kata yang diberi warna secondary, e.g. Vanguard');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('cta_text_1')->default('Learn More');
            $table->string('cta_text_2')->default('See Our Programs');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
