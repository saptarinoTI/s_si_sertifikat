<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BilingItem extends Model
{
    protected $table = "biling_items";
    protected $fillable = [
        "biling_id",
        "uraian",
        "volume",
        "tarif",
        "satuan",
        "jumlah",
    ];

    public function biling()
    {
        return $this->belongsTo(Biling::class, "biling_id", "id");
    }
}
