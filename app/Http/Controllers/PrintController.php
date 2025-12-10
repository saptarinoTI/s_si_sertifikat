<?php

namespace App\Http\Controllers;

use App\Models\Biling;
use App\Models\Ttd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PrintController extends Controller
{
     public function biling(Biling $record)
    {
        $ttd = Ttd::where('status', '1')->first();
        $pdf = Pdf::loadView('pdf.biling', [
            'biling' => $record,
            'ttd' => $ttd,
        ]);

        return $pdf->download('pdf.biling');
    }
    
     public function kuitansi(Biling $record)
    {
        $ttd = Ttd::where('status', '1')->first();
        $pdf = Pdf::loadView('pdf.kuitansi', [
            'kuitansi' => $record,
            'ttd' => $ttd,
        ]);

        return $pdf->download('pdf.kuitansi');
    }

     public function sertifikat(Biling $record)
    {
        $ttd = Ttd::where('status', '1')->first();
        $pdf = Pdf::loadView('pdf.sertifikat', [
            'data' => $record,
            'ttd' => $ttd,
        ]);

        return $pdf->download('pdf.sertifikat');
    }
}
