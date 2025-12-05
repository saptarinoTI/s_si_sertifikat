<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = "sertifikat";
    protected $fillable = [
        "pik_id",
        "nomor_sertifikat",
        "file_pdf",
        "tanggal_terbit",
    ];

    public function pik()
    {
        return $this->belongsTo(Pik::class, "pik_id", "id");
    }
}
