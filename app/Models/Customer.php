<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard_name = 'web';
    protected $guard = 'web';

    protected $fillable = [
    	'code',
    	'name',
    	'avatar',
    	'gender',
    	'address',
    	'birthday',
    	'phone',
        'password',
        'email',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

