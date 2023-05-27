<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
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
        // dd($order);
        //// get store owner of the order item
        // $user = User::where('store_id','=',$order->store_id)->first();
        //// get admin 
        $admin =  Admin::where('id','=',1)->first();
        // dd($order,$admin);
        
        //// send notification to admin
        $admin->notify(new OrderCreatedNotification($order));
        
        //// send notification to store owner
        // $user->notify(new OrderCreatedNotification($order));

    
        //// if we want send notification to many users
        // $users = User::where('store_id','=',$order->store_id)->get();
        // Notification::send($users , new OrderCreatedNotification($order));

    }
}
