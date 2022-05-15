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
        'province_id',
        'district_id',
        'university_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }
}

