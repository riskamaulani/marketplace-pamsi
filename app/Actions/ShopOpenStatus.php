<?php

namespace App\Actions;

use Carbon\Carbon;

class ShopOpenStatus
{
    public static function handle(string $data)
    {
        $data = json_decode($data);

        // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
        $currentDay = Carbon::now('Asia/Makassar')->dayOfWeek;

        // Check if the shop is open today
        $isOpenToday = $data[$currentDay];

        // Set shop status based on the schedule
        $shopStatus = $isOpenToday ? 'Buka' : 'Tutup';

        return $shopStatus;
    }
}
