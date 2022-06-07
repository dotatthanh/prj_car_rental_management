<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utiliti extends Model
{
    use HasFactory;

    protected $table = 'utilities';

    protected $fillable = [
    	'name',
    ];

    public function roomUtilities()
    {
        return $this->hasMany(RoomUtiliti::class);
    }
}
