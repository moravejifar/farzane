<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function people()
    {
      return $this->belongsTo(People::class);

    }
    public function membership()
    {
      return $this->belongsTo(Membership::class);

    }
    public function transaction()
    {
      return $this->belongsTo(Transaction::class);

    }
}
