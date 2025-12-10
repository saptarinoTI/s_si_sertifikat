<?php

if (!function_exists('terbilang')) {
    function terbilang($angka) {
        $angka = (int) $angka;
        $bilangan = array(
            "", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan",
            "Sepuluh", "Sebelas"
        );
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return terbilang($angka - 10) . " Belas";
        } else if ($angka < 100) {
            return terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
        } else if ($angka < 200) {
            return "Seratus " . terbilang($angka - 100);
        } else if ($angka < 1000) {
            return terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
        } else if ($angka < 1000000) {
            return terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
        } else if ($angka < 1000000000) {
            return terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
        }
    }
}
