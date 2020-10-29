<?php

namespace App\Listeners;

use App\Events\BuyEvent;
use DateTime;
use DateTimeZone;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BuyEventListener
{
    public function __construct()
    {
    }

    public function handle(BuyEvent $event)
    {
        $message = $event->message;

        $file = '../.order-log';
        if (!file_exists($file)) {
            touch($file);
        }
        $datetime = new DateTime("now", new DateTimeZone('Asia/Irkutsk'));

        $content = file_get_contents($file);
        $content .= "purchase was commited at {$datetime->format('Y-m-d H:i:s')}\n";
        file_put_contents($file, $content);
    }
}
