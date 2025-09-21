<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miscellaneous_charges_add extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'miscellaneous_charges_add';

    public function transaction()
{
    return $this->hasMany(Transaction::class);

}
public function miscellaneous_charge()
{
    return $this->hasMany(Miscellaneous_charge::class);

}
}
