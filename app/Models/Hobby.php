<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $table = 'hobbys';

    protected $fillable = [
    	'name',
    ];

    public function hobbyRooms()
    {
        return $this->hasMany(HobbyRoom::class);
    }
}
