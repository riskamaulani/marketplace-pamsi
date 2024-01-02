<?php

namespace App\Actions;

class ConvertToDayOfWeek
{
    public static function handle($data)
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $result = ''; $status = false;
        foreach($data as $key=>$value) {
            if($value) {
                if ($key != array_key_last($data) && $status) {
                    $result .= ' | ';
                } else {
                    $status = true;
                }

                $result .= $days[$key];
            }
        }

        return $result;
    }
}
