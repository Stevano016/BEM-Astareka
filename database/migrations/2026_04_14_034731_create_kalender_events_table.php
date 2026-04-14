<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kalender_events', function (Blueprint $row) {
            $row->id();
            $row->string('judul');
            $row->text('deskripsi')->nullable();
            $row->dateTime('waktu_mulai');
            $row->dateTime('waktu_selesai')->nullable();
            $row->string('warna')->default('#3b82f6'); // Default Blue
            $row->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kalender_events');
    }
};
