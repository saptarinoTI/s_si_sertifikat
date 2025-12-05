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
        Schema::create("pik", function (Blueprint $table) {
            $table->id();

            $table->string("nomor_pik")->unique();
            $table->string("nama_umum");
            $table->string("nama_ilmiah")->nullable();
            $table->string("bentuk");
            $table->string("jumlah");
            $table->string("bahan_kemasan");
            $table->string("tanda_kemasan");
            $table->string("peti_kemas");
            $table->string("nama_pengirim");
            $table->text("alamat_pengirim");
            $table->string("lainnya_pengirim");
            $table->string("nama_penerima");
            $table->text("alamat_penerima");
            $table->string("lainnya_penerima");
            $table->text("tujuan_pengeluaran");
            $table->string("area_asal");
            $table->string("area_tujuan");
            $table->string("alat_angkut");
            $table->date("tanggal_berangkat");

            $table->enum("status", [
                "baru",
                "diverifikasi",
                "ditolak",
                "menunggu_bayar",
                "lunas",
                "sertifikat_terbit",
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pik");
    }
};
