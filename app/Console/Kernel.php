<?php

namespace BovinApp\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        Commands\Inspire::class,
        Commands\SendEmail::class,
        Commands\Email_list::class,

       
       
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {  
      $schedule->command('send:email')->daily();
      $schedule->command('create:email_list')->everyMinute();
    }
}
//dailyAt('13:00');