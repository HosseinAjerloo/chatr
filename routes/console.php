<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Facades\Schedule;
Schedule::command('queue:work --queue=default --stop-when-empty')->withoutOverlapping()->everyThirtyMinutes()->runInBackground();

Schedule::job(new \App\Jobs\SendSMS)->everyMinute();
Schedule::command('queue:work --queue=sms-send --stop-when-empty')->withoutOverlapping()->everyMinute();

