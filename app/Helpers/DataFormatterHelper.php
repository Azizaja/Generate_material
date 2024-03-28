<?php

class DataFormatterHelper
{
    public static function stripNonNumber($campur)
    {
        $hasil = '';
        for ($i = 0; $i < strlen($campur); $i++) {
            $c = ord($campur[$i]);
            if (($c >= 0x30) && ($c <= 0x39)) {
                $hasil .= $campur[$i];
            }
        }
        return $hasil;
    }
    public static function stripNpwpDots($campur)
    {
        return self::stripNonNumber($campur);
    }
    public static function formatNpwp($angka)
    {
        $return = null;
        $angkaNormal = self::stripNpwpDots($angka);
        if ($angkaNormal) {
            $return = sprintf(
                "%s.%s.%s.%s-%s.%s",
                substr($angkaNormal, 0, 2),
                substr($angkaNormal, 2, 3),
                substr($angkaNormal, 5, 3),
                substr($angkaNormal, 8, 1),
                substr($angkaNormal, 9, 3),
                substr($angkaNormal, 12, 3)
            );
        }
        return $return;
    }
}
