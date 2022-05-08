<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyRoom extends Model
{
    use HasFactory;

    protected $fillable = [
    	'room_id',
    	'hobby_id',
    ];

    public function hobby()
    {
        return $this->belongsTo(Hobby::class);
    }
}
