<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event;
use App\Http\Controllers\HomeController;
use DB;


class EmailNotification extends Notification
{
    use Queueable;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
   
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
          
        //   $events = DB::table('events')->select('title','start','end')->first();
           
             $events = DB::table('events')->get();
             foreach ($events as $event) {
                # code...
               

        return (new MailMessage)

                     
                    ->greeting('Event Title:'.$event->title)
                    ->line('When:'.$event->start)
                    ->line('End:'.$event->end)
                    ->line('Thank you!');

                }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
        ];
    }
}
