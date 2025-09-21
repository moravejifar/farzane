<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function customer()
{
    return $this->hasMany(Customer::class);

}
public function people()
{
    return $this->hasMany(People::class);

}

}
