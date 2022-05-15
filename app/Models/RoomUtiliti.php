<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUtiliti extends Model
{
    use HasFactory;

    protected $fillable = [
    	'room_id',
    	'utiliti_id',
    ];

    public function utiliti()
    {
        return $this->belongsTo(Utiliti::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
