<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Admin;
use App\Models\Vendor;
use App\Notifications\OrderCreatedNotification;

use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
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
    public function handle(OrderCreated $event)
    {
        // a php issue how send email and this is it's solution
        ini_set('max_execution_time', 300);

        //// get order
        $order = $event->order;

        // get store vendor of the order item
        $vendor = Vendor::where('store_id', '=', $order->store_id)->first();
        //// get admin
        $admins = Admin::all();
        // send notifications to all admins
        Notification::send($admins, new OrderCreatedNotification($order));

        //// send notification to admin
        // $admin->notify(new OrderCreatedNotification($order));

        
        // send notification to store vendor
        // Notify the store vendor
        if ($vendor) {
            $vendor->notify(new OrderCreatedNotification($order));
        }

        //// if we want send notification to many users
        // $users = User::where('store_id','=',$order->store_id)->get();
        // Notification::send($users , new OrderCreatedNotification($order));

    }
}
