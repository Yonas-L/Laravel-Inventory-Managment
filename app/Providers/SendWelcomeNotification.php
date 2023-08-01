<?php

namespace App\Providers;

use App\Mail\WelcomeMail;
use App\Providers\UserHasBeenVerified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     * 
     */
    

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\UserHasBeenVerified  $event
     * @return void
     */
    public function handle(UserHasBeenVerified $event)
    {
        //* Sending a welcome message to the verified user.
        Mail::to($event->user)->send(new WelcomeMail($event->user));
    }
}
