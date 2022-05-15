<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
    	'code',
    	'name',
    	'acreage',
    	'address',
    	'description',
    	'price',
    	'status',
        'image',
        'amount',
        'university_id',
        'user_id',
        'district_id',
        'hired'
    ];

    public function utilities()
    {
        return $this->hasMany(RoomUtiliti::class);
    }

    public function hobbys()
    {
        return $this->hasMany(HobbyRoom::class);
    }

    public function types()
    {
        return $this->hasMany(RoomType::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getHiredAttribute()
    {
        if ($this->bookings->where('status', 1)->count())
        return $this->bookings->where('status', 1)->count();
    else
        return 0;
    }
}
