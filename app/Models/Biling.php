<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biling extends Model
{
    protected $table = "biling";
    protected $fillable = [
        "pik_id",
        "kode_biling",
        "total",
        "tanggal_biling",
        "tanggal_kadaluarsa",
        "status",
        "tanggal_bayar",
        "bukti_pembayaran",
    ];

    public function pik()
    {
        return $this->belongsTo(Pik::class, "pik_id", "id");
    }

    public function items()
    {
        return $this->hasMany(BilingItem::class, "biling_id", "id");
    }

    public function kuitansis()
    {
        return $this->hasMany(Kuitansi::class, "biling_id", "id");
    }
}
