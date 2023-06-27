<?php

namespace App\Listeners;

use App\Events\OrderToDelivery;
use App\Models\Delivery;
use App\Models\OrderDelivery;
use App\Notifications\OrderCreatedNotification;

class SendOrderToDelivery
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        //// get order
        $order = $event->order;
        $order_delivery = OrderDelivery::where('order_id', $order->id)->first();
        $delivery = Delivery::where('id', $order_delivery->delivery_id)->first();
        if ($delivery) {
            $delivery->notify(new OrderCreatedNotification($order));
        }


    }
}
