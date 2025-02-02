<?php
if (!function_exists('tambahkanSpasi')) {
    function tambahkanSpasi($teks)
    {
        $teks = preg_replace('/([.,])(?!\s)/', '$1 ', $teks);
        $teks = preg_replace('/\s{2,}/', ' ', $teks);
        return trim($teks);
    }
}
