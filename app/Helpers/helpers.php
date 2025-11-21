<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka, $withDesimal = false)
    {
        if ($withDesimal) {
            return 'Rp ' . number_format($angka, 2, ',', '.');
        }
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
