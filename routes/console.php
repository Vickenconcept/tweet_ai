<?php

use App\Jobs\CreateAutobotsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// $schedule->job(new CreateAutobotsJob)->hourly();
// Schedule::call(new CreateAutobotsJob)->everySecond();

// Schedule::call(function (Schedule $schedule) {
//     $schedule->job(new CreateAutobotsJob)->everySecond();
// })->daily();
