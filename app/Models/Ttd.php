<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    protected $table = 'ttd';

    protected $fillable = [
        'nama',
        'nomor',
        'status',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->status == '1') {
                static::where('id', '!=', $model->id)->update([
                    'status'=> '0',
                ]);
            }
        });
    }
}
