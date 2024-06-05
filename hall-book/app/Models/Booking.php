<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'faculty', 'post', 'booking_date', 'start_time', 'end_time', 'activity', 'file_path'
    ];

}