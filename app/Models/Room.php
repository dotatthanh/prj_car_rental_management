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
        'user_id',
        'district_id',
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
}
