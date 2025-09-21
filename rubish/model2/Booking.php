<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;



    public function item()
{
    return $this->hasMany(Item::class);

}
public function customer()
{
    return $this->hasMany(Customer::class);

}
public function payment()
{
   return $this->belongsTo(Booking::class);

}
public function reminder()
{
return $this->belongsTo(Riminder::class);

}
public function order()
{
return $this->belongsTo(Order::class);

}

}

