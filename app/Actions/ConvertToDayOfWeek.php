<?php

namespace App\Actions;

class ConvertToDayOfWeek
{
    public static function handle(array $data)
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $result = null; $status = false;
        foreach($data as $key=>$value) {
            if($value) {
                if ($key != array_key_last($data)+1 && $status) {
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