<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\CreateUser::class,
        \App\Console\Commands\UpdateUser::class,
        \App\Console\Commands\DeleteUser::class,
        \App\Console\Commands\ListUsers::class,
    ];

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}
