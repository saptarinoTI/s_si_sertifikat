<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .header .title {
            font-weight: bold;
            font-size: 16px;
        }

        .header .subtitle {
            font-weight: bold;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .info td {
            padding: 2px 0;
        }

        .table-data,
        .table-data th,
        .table-data td {
            border: 1px solid black;
        }

        .table-data th {
            text-align: center;
            padding: 5px;
            font-weight: bold;
        }

        .table-data td {
            padding: 5px;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .signature {
            margin-top: 30px;
            width: 100%;
        }

        .signature td {
            vertical-align: top;
            text-align: center;
        }

        .qr {
            width: 120px;
            height: 120px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header" style="position: relative;">
        {{-- LOGO --}}
        <div class="text-center" style="position: absolute; top: 10px; left: 20px;">
            <img src="{{ public_path('assets/images/Logo_Badan_Karantina_Indonesia.png') }}" width="80" alt="logo">
        </div>

        <div class="title">BADAN KARANTINA INDONESIA</div>
        <div class="subtitle">BALAI BESAR KARANTINA HEWAN, IKAN DAN TUMBUHAN</div>
        <div class="subtitle">KALIMANTAN TIMUR</div>

        <div style="font-size: 11px; margin-top: 4px;">
            JL. PELITA NO.3 SEMPINGAN BALIKPAPAN 76115 <br>
            TELEPON : (0542) 8523292 FAKSIMILI : (0542) 413650 <br>
            email : <span
                style="text-decoration: underline; font-weight: 600; color: blue;">karantinakaltim@karantinaindonesia.go.id</span>
        </div>
    </div>

    <hr style="border:1px solid black">

    {{-- KODE KUITANSI DI KANAN --}}
    <div style="text-align:right; font-size:12px; margin-bottom:5px;">
        {{ $kuitansi->kode_biling ?? '' }}
    </div>

    {{-- TITLE --}}
    <div style="text-align: center; font-weight:bold; font-size: 15px; margin-bottom:5px;">
        KUITANSI
    </div>

    {{-- NOMOR --}}
    <div style="text-align:center; margin-bottom:10px;">
        NOMOR: {{ $kuitansi->kode_biling ?? '' }}
    </div>

    {{-- INFO PENERIMA --}}
    <table class="info">
        <tr>
            <td style="width:150px;">Telah terima dari</td>
            <td>: {{ strtoupper($kuitansi->pik?->nama_pengirim) ?? '' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ ucwords($kuitansi->pik?->alamat_pengirim) ?? '' }}</td>
        </tr>
        <tr>
            <td>Uang Sejumlah</td>
            <td>: Rp. {{ number_format($kuitansi->total ?? '', 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Terbilang</td>
            <td>: {{ terbilang($kuitansi->total ?? '') }} Rupiah</td>
        </tr>
    </table>

    <br>

    <div>Untuk pembayaran jasa tindakan Karantina sebagai berikut:</div>

    <br>

    {{-- TABEL BIAYA --}}
    <table class="table-data">
        <tr>
            <th>No</th>
            <th>Jasa Tindakan Karantina / Penggunaan Sarana</th>
            <th>Biaya Satuan (Rp.)</th>
            <th>Jumlah / Volume</th>
            <th>Total (Rp.)</th>
        </tr>

        {{-- ROW 1 --}}
        @foreach($kuitansi->items as $i => $d)
            <tr>
                <td class="center">{{ $i + 1 }}</td>
                <td>{{ $d->uraian ?? '' }}</td>
                <td class="right">{{ number_format($d->tarif ?? '', 2, ',', '.') }}</td>
                <td>{{ $d->jumlah }} / {{ $d->volume ?? '' }}</td>
                <td class="right">{{ number_format($d->jumlah ?? '', 2, ',', '.') }}</td>
            </tr>
        @endforeach

        {{-- TOTAL --}}
        <tr>
            <td colspan="4" class="right"><b>Jumlah Keseluruhan (Rp.)</b></td>
            <td class="right">
                <b>{{ number_format($kuitansi->total ?? '', 2, ',', '.') }}</b>
            </td>

        </tr>
    </table>

    {{-- TANDA TANGAN --}}
    <table class="signature">
        <tr>
            <td></td>
            <td style="text-align:right;">
                <small>KOTA BONTANG, {{ now()->format('d F Y') }}</small><br />
                <small>{{ strtoupper($ttd->nama) ?? "" }}</small><br />
                <small>{{ $ttd->nomor ?? "" }}</small>
            </td>
        </tr>
    </table>

</body>

</html>