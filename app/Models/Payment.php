<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payment';

    public function transaction()
    {
      return $this->belongsTo(Transaction::class);

    }

    public function employee()
    {
      return $this->belongsTo(Employee::class);

    }

    public function payment_type()
{
    return $this->hasMany(Payment_type::class);

}
}
