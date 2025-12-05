<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    protected $table = "resi";
    protected $fillable = ["sertifikat_id", "resi", "ekspedisi", "tanggal"];

    public function sertifikat()
    {
        return $this->belongsTo(Sertifikat::class, "sertifikat_id", "id");
    }
}
