<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Facades\Schedule;
Schedule::command('queue:work --queue=default --stop-when-empty')->withoutOverlapping()->everyMinute()->runInBackground();
Schedule::command('schedule:cache-clear')->dailyAt('01:00');
Schedule::job(new \App\Jobs\SendSMS)->everyMinute();
Schedule::command('queue:work --queue=sms-send --stop-when-empty')->withoutOverlapping()->everyMinute();
Schedule::command('queue:clear')->daily()->withoutOverlapping(); ;
