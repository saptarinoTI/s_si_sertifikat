<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("sertifikat", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pik_id");
            $table->string("nomor_sertifikat");
            $table->string("file_pdf");
            $table->date("tanggal_terbit");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("sertifikat");
    }
};
