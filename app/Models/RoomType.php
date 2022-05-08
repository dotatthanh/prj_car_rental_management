<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
    	'room_id',
    	'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
