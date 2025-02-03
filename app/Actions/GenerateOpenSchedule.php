<?php

namespace App\Actions;

class GenerateOpenSchedule
{
    public static function handle(string $data)
    {
        $data = json_decode($data);

        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

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

        return $result ?? '-';
    }
}
