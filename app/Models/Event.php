<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events_listings';

    protected $fillable = [
        'eventTitle',
        'eventDescription',
        'date',
        'start_time',
        'end_time',
        'location',
        'image',
        'pdf',
        'event_status',

    ];
}
