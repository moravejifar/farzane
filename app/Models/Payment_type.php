<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payment_type';

    public function payment()
    {
      return $this->belongsTo(Payment::class);

    }
}
