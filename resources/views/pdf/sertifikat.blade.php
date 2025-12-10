<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sertifikat KT-3</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
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

        .underline {
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 5px;
            font-size: 11px;
        }

        .border {
            border: 1px solid #000;
        }

        .border td {
            border: 1px solid #000;
        }

        .title {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="text-right bold" style="font-size: 13px;">
        KT-3
    </div>

    <br>

    <div class="text-center">
        <img src="{{ public_path('assets/images/National_emblem_of_Indonesia_Garuda_Pancasila.svg.png') }}" width="70">
    </div>

    <div class="text-center" style="margin-top:5px;">
        <div class="bold">REPUBLIK INDONESIA</div>
        <div class="bold">BADAN KARANTINA INDONESIA</div>
        <div class="bold">No:053UHLF</div>
    </div>

    <hr>

    <div class="text-center title">
        SERTIFIKAT KESEHATAN TUMBUHAN ANTAR AREA
    </div>
    <div class="text-center bold">
        Nomor.: {{ $data->kode_biling ?? '' }}
    </div>

    <br>

    <p style="text-align: justify; font-size: 10px;">
        Berdasarkan Undang-Undang Nomor 21 Tahun 2019 tentang Karantina Hewan, Ikan, dan Tumbuhan dan Peraturan
        Pemerintah
        Nomor 29 Tahun 2023 tentang Peraturan Pelaksanaan Undang-Undang Nomor 21 Tahun 2019 tentang Karantina Hewan,
        Ikan, dan
        Tumbuhan, serta menindaklanjuti Laporan Pengeluaran Media Pembawa Nomor {{ $data->kode_biling ?? '' }}.
        Tanggal {{ $data->tanggal_bayar ?? '' }},
        menyatakan hasil tindakan karantina tumbuhan dan/atau pengawasan, media pembawa tersebut di bawah ini:
    </p>

    <br>

    <table class="border">
        <tr>
            <td width="33%"><b>Nama umum(dagang):</b><br>{{ $data->pik?->nama_umum ?? '' }}</td>
            <td width="33%"><b>Nama ilmiah*):</b><br>{{ $data->pik?->nama_ilmiah ?? '' }}</td>
            <td width="33%"><b>Bentuk:</b><br>{{ $data->pik->bentuk ?? '' }}</td>
        </tr>

        <tr>
            <td>
                <b>Jumlah:</b><br>{{ $data->pik?->jumlah ?? '' }}
            </td>
            <td>
                <b>Bahan pembungkus/kemasan</b><br>{{ $data->pik?->bahan_kemasan ?? '' }}
            </td>
            <td>
                <b>Tanda pada pembungkus/kemasan:</b><br>{{ $data->pik?->tanda_kemasan ?? '' }}
            </td>
        </tr>

        <tr>
            <td>
                <b>Jumlah dan nomor peti kemas*):</b><br>{{ $data->pik?->peti_kemas ?? '' }}
            </td>

            {{-- PENGIRIM --}}
            <td>
                <b>Identitas Pengirim</b><br>
                Nama : {{ strtoupper($data->pik?->nama_pengirim ?? '') }}<br>
                Alamat : {{ strtoupper($data->pik?->alamat_pengirim ?? '') }}<br>
                Lainnya : {{ $data->pik?->lainnya_pengirim ?? '-' }}
            </td>

            {{-- PENERIMA --}}
            <td>
                <b>Identitas Penerima</b><br>
                Nama : {{ strtoupper($data->pik?->nama_penerima ?? '') }}<br>
                Alamat : {{ strtoupper($data->pik?->alamat_penerima ?? '') }}<br>
                Lainnya : {{ $data->pik?->lainnya_penerima ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>
                <b>Tujuan pengeluaran:</b><br>
                {{ strtoupper($data->pik?->tujuan_pengeluaran) ?? '' }}
            </td>
            <td>
                <b>Area asal dan tempat pengeluaran:</b><br>
                {{ strtoupper($data->pik?->area_asal) ?? '' }}
            </td>

            <td>
                <b>Area tujuan dan tempat pemasukan:</b><br>
                {{ strtoupper($data->pik?->area_tujuan) ?? '' }}
            </td>
        </tr>

        <tr>
            <td>
                <b>Jenis dan nama alat angkut:</b><br>
                {{ strtoupper($data->pik?->alat_angkut) ?? '' }}
            </td>
            <td>
                <b>Tanggal berangkat:</b><br>{{ date('d F Y', strtotime($data->tgl_berangkat)) ?? '' }}
            </td>
            <td>
            </td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify;">
        telah memenuhi semua persyaratan yang ditetapkan bagi pengeluarannya ke area tujuan.
    </p>

    <div style="border-top: 1px solid #000; width: 100%; font-weight: bold;">KETERANGAN TAMBAHAN: *)</div>
    <br>

    <div style="border-top: 1px solid #000; width: 100%; font-weight: bold;">Tujuan</div>
    <br>

    <div style="border-top: 1px solid #000; border-bottom: 1px solid #000; width: 100%; font-weight: bold;">PERLAKUAN *)</div>
    <ol>
        <li>Tanggal ==</li>
        <li>Jenis Perlakuan: ==NONE==</li>
        <li>Jenis Pestisida/bahan yang digunakan: ==</li>
        <li>Dosis: ==</li>
        <li>Durasi dan Suhu: ==</li>
        <li>Informasi Tambahan: ==</li>
    </ol>

    <hr>

    <div style="margin-top: 60px; text-align: right;">
        <b>Bontang, {{ date('d F Y', strtotime($data->tanggal_bayar)) ?? '' }}</b><br>
        <span>Pejabat Karantina Tumbuhan.</span><br><br><br>
        <b>{{ strtoupper($ttd->nama) ?? '' }}</b><br>
        {{ $ttd->nomor ?? '' }}
    </div>

</body>

</html>