<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Http\Traits\sendWhatsAppMessage;
use App\Models\Admin;
use App\Models\Vendor;

use App\Notifications\OrderCreatedNotification;

use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
{
    use sendWhatsAppMessage;
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
                
        
        // get order
        $order = $event->order;

        // get store vendor of the order item
        $vendors = Vendor::where('store_id', '=', $order->store_id)->get();
        // get all admins
        $admins = Admin::all();
        
        //// if we want send notification to many users
        // $users = User::where('store_id','=',$order->store_id)->get();
        // Notification::send($users , new OrderCreatedNotification($order));

        //// send notification to specific admin
        // $admin->notify(new OrderCreatedNotification($order));
        $delivery_admin = Admin::whereHas('roles', function ($query) {
            $query->where('name', 'Delivery Admin');
        })->first();         

        
        // send notifications to all admins
        Notification::send($admins, new OrderCreatedNotification($order));
        
        
        
        if ($vendors) {
             // send notification to store vendor 
            foreach ($vendors as $vendor) {
                $vendor->notify(new OrderCreatedNotification($order));

                // send whatsapp message to vendor 
                $message = 'تم طلب أوردر رقم : ' . $order->number . "\n";
                $message .=  'أسم المحل: ' . $order->store->name . "\n";
                $message .=  'عنوان العميل : ' . $order->shippingAddress->street_address . "\n";
                $this->sendMessage($vendor->phone , $message);

                if($delivery_admin){
                    $this->sendMessage($delivery_admin->phone_number , $message);
                }
            }
            
        }

        

        

    }
}