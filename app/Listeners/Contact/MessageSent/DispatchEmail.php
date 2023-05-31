<?php

namespace App\Listeners\Contact\MessageSent;

use App\Events\Contact\MessageSent;
use App\Notifications\Contact\MessageSent\ToSacJB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class DispatchEmail implements ShouldQueue
{
    use Queueable;

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
     * @param  \App\Events\Contact\MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        // To sac@justbeauty.com.br
        Notification::route('mail','sac@justbeauty.com.br')->notify(new ToSacJB($event->form));
    }
}
