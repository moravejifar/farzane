<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function miscellaneous_charges_add()
    {
      return $this->belongsTo(Miscellaneous_charges_add::class);

    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);

    }
     public function employee()
{
    return $this->hasMany(Employee::class);

}
    public function customer()
{
    return $this->hasMany(Customer::class);

}
    public function payment()
{
    return $this->hasMany(Payment::class);

}
    public function hotel()
{
    return $this->hasMany(Hotel::class);

}

}
