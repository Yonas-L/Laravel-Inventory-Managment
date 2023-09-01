<?php

namespace App\Listeners;

use App\Events\ReportHasBeenRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateReport
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ReportHasBeenRequested  $event
     * @return void
     */
    public function handle(ReportHasBeenRequested $event)
    {
        //dd($event->report);
        
    }
}
