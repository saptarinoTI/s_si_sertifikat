<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pik extends Model
{
    protected $table = "pik";
    protected $fillable = [
        "nomor_pik",
        "nama_umum",
        "nama_ilmiah",
        "bentuk",
        "jumlah",
        "bahan_kemasan",
        "tanda_kemasan",
        "peti_kemas",
        "nama_pengirim",
        "alamat_pengirim",
        "lainnya_pengirim",
        "nama_penerima",
        "alamat_penerima",
        "lainnya_penerima",
        "tujuan_pengeluaran",
        "area_asal",
        "area_tujuan",
        "alat_angkut",
        "tanggal_berangkat",
        "status",
    ];
}
