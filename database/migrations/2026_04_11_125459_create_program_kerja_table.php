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
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('departemen')->nullable();
            $table->string('icon')->default('hub')->comment('Material Symbols icon name');
            $table->string('bg_style')->default('surface')->comment('Options: primary, secondary-container, surface-container-low, surface-container-highest');
            $table->boolean('is_featured')->default(false)->comment('Featured = big bento card');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja');
    }
};
