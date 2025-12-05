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
        Schema::create("biling_items", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("biling_id");
            $table->text("uraian");
            $table->string("volume");
            $table->string("tarif");
            $table->string("satuan");
            $table->string("jumlah");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("biling_items");
    }
};
