<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerParkingSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'parking_slot_id',
        'form_rent',
        'start_time',
        'end_time',
        'status',
        'total_money',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function parkingSlot()
    {
        return $this->belongsTo(ParkingSlot::class);
    }
}
