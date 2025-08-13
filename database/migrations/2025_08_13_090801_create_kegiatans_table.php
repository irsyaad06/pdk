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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('lokasi')->nullable(); // 'Online via Zoom' / alamat
            $table->integer('kuota')->nullable();
            $table->boolean('ada_presensi')->default(true);
            $table->boolean('ada_tugas')->default(false);
            $table->integer('donasi_minimum')->default(0); // untuk sertifikat
            $table->enum('status', ['draft', 'dibuka', 'ditutup'])->default('draft');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
