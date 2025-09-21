<?php

namespace App\Models;
// use Database\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;
    public $timestamps = false;
    public function booking()
{
    return $this->belongsTo(Booking::class);

}
public function order()
{
   return $this->belongsTo(Order::class);

}
}
