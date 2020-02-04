<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceive;
use App\Event\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAutoresponder
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
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //
        $message = $event->message;
        $request = $event->request;
        Mail::to('ammiel16@gmail.com')->send(new MessageReceive($request));
    }
}
