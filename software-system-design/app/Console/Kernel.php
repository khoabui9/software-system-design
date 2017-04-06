<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
  $a = 13;
  $b = 14;
  $c = 15;
  $d = 20;
  //////
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [////////
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }//////////

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {////////
        require base_path('routes/console.php');//////////
    }
}
