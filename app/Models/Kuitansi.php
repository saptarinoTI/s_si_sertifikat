<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    protected $table = "kuitansi";
    protected $fillable = [
        "biling_id",
        "nomor_kuitansi",
        "satker",
        "jumlah",
        "tanggal",
    ];

    public function biling()
    {
        return $this->belongsTo(Biling::class, "biling_id", "id");
    }
}
