<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id', 'title_of_the_event', 'location_of_the_event', 'event_date_time'
    ];


    protected $table = "events";


    protected $casts = [
        'created_at' => 'datetime',
        'event_date_time' => 'date:hh:mm',
        
    ];


    public function user() {
        return $this->belongsTo('App\Models\User');

    }
}
