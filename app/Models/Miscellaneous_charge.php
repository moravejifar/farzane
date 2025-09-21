<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miscellaneous_charge extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function miscellaneous_charges_add()
    {
      return $this->belongsTo(Miscellaneous_charges_add::class);

    }
}
