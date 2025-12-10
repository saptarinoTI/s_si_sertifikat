<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bukti Pembayaran Tagihan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 10px;
        }

        table th,
        table td {
            padding: 6px;
            border: 1px solid #000;
            font-size: 11px;
        }

        .no-border td {
            border: none !important;
            padding: 2px 0;
        }

        .header-title {
            font-size: 16px;
            font-weight: bold;
        }

        .sub-header {
            font-size: 13px;
            font-weight: bold;
            text-decoration: underline;
        }

        .section-title {
            margin-top: 15px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    {{-- LOGO --}}
    <div class="text-center">
        <img src="{{ public_path('assets/images/Logo_Badan_Karantina_Indonesia.png') }}" width="80" alt="logo">
    </div>

    {{-- TITLE --}}
    <div class="text-center" style="margin-bottom: 10px;">
        <div class="header-title">BADAN KARANTINA INDONESIA</div>
        <div class="sub-header">BALAI BESAR KARANTINA HEWAN, IKAN, DAN TUMBUHAN KALIMANTAN TIMUR</div>

        <br>

        <div class="bold" style="font-size: 14px;">
            BUKTI PEMBAYARAN TAGIHAN <br>
            PENERIMAAN NEGARA BUKAN PAJAK (PNBP)
        </div>
    </div>

    {{-- DATA PEMBAYARAN --}}
    <div class="section-title">DATA PEMBAYARAN TAGIHAN</div>

    <table class="no-border">
        <tr>
            <td width="170">Kode Billing</td>
            <td>: {{ $biling->kode_biling ?? '' }}</td>
        </tr>
        <tr>
            <td>Tanggal Billing</td>
            <td>: {{ date('d F Y', strtotime($biling->tanggal_biling )) ?? '' }}</td>
        </tr>
        <tr>
            <td>Tanggal Kadaluarsa</td>
            <td>: {{ date('d F Y', strtotime($biling->tanggal_kadaluarsa )) ?? '' }}</td>
        </tr>
        <tr>
            <td>Nama Wajib Bayar</td>
            <td>: {{ strtoupper($biling->pik->nama_pengirim) ?? '' }}</td>
        </tr>
        <tr>
            <td>Jumlah Pembayaran</td>
            <td>: Rp. {{ number_format($biling->total ?? '', 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Terbilang</td>
            <td>: {{ terbilang($biling->total ?? '') }} Rupiah</td>
        </tr>
        <tr>
            <td>Status Bayar</td>
            <td>: {{ ucwords($biling->status) ?? '' }}</td>
        </tr>
        <tr>
            <td>Tanggal Bayar</td>
            <td>: {{ $biling->tanggal_bayar == null ? '' : date('d F Y', strtotime($biling->tanggal_bayar )) }}</td>
        </tr>
        <tr>
            <td>NTB</td>
            <td>: {{ strtoupper($biling->ntb) ?? '' }}</td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td>: {{ strtoupper($biling->ntpn) ?? '' }}</td>
        </tr>
        <tr>
            <td>Bank</td>
            <td>: {{ strtoupper($biling->bank) ?? '' }}</td>
        </tr>
        <tr>
            <td>Channel Bayar</td>
            <td>: {{ strtoupper($biling->channel_bayar) ?? '' }}</td>
        </tr>
    </table>


    {{-- DAFTAR KUITANSI --}}
    <div class="section-title">Daftar Kuitansi</div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Kuitansi</th>
                <th>Tanggal Kuitansi</th>
                <th>Satker/Wilker</th>
                <th>Jumlah (Rp.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($biling->kuitansis as $i => $kuitansi)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $kuitansi->nomor_kuitansi }}</td>
                    <td>{{ date('d F Y', strtotime($kuitansi->tanggal)) }}</td>
                    <td>{{ $kuitansi->satker }}</td>
                    <td class="text-right">{{ number_format($kuitansi->jumlah, 2, ',', '.') }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4" class="text-right bold">Total:</td>
                <td class="text-right bold">
                    {{ number_format($biling->total ?? 10002, 2, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    {{-- DETAIL KUITANSI --}}
    <div class="section-title">Detil Kuitansi</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Uraian</th>
                <th>Volume x frek.</th>
                <th>Tarif (Rp.)</th>
                <th>Satuan</th>
                <th>Jumlah (Rp.)</th>
            </tr>
        </thead>

        <tbody>
            @foreach($biling->items as $i => $d)
            <tr>
                <td class="text-center">{{ $i+1 }}</td>
                <td>{{ $d->uraian }}</td>
                <td class="text-center">{{ $d->volume }}</td>
                <td class="text-right">{{ number_format($d->tarif, 2, ',', '.') }}</td>
                <td>{{ $d->satuan }}</td>
                <td class="text-right">{{ number_format($d->jumlah, 2, ',', '.') }}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5" class="text-right bold">Total:</td>
                <td class="text-right bold">
                    {{ number_format($biling->total ?? 10002, 2, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <br><br>

    {{-- FOOTER --}}
    <div class="text-right" style="margin-bottom: 5px;">
        <small>KOTA BONTANG, {{ now()->format('d F Y') }}</small>
    </div>

    <div class="text-right" style="margin-top: 5px;">
        <div class="bold"><small>{{ strtoupper($ttd->nama) ?? "RIVALDY" }}</small></div>
        <div><small>{{ $ttd->nomor ?? "198912062009121001" }}</small></div>
    </div>

</body>

</html>