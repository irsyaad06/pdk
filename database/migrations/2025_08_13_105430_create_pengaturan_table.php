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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // path logo
            $table->string('nama_app')->nullable();
            $table->string('fav_icon')->nullable(); // path favicon
            $table->string('email')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->string('link_x')->nullable(); // Twitter/X
            $table->string('link_facebook')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
