<?php

namespace App\Listeners\Contact\MessageSent;

use App\Events\Contact\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateOnDatabase
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
     * @param  \App\Events\Contact\MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        //
    }
}
