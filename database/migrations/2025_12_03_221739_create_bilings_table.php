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
        Schema::create("biling", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("pik_id");
            $table->string("kode_biling");
            $table->string("total");
            $table->date("tanggal_biling");
            $table->date("tanggal_kadaluarsa");
            $table->enum("status", ["pending", "paid", "expired"]);
            $table->date("tanggal_bayar")->nullable();
            $table->string("ntb")->nullable();
            $table->string("ntpn")->nullable();
            $table->string("bank")->nullable();
            $table->string("channel_bayar")->nullable();
            $table->string("bukti_pembayaran")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("biling");
    }
};
