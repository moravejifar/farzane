<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function timesheet()
    {
      return $this->belongsTo(Timesheet::class);

    }
    public function transaction()
    {
      return $this->belongsTo(Transaction::class);

    }

    public function job_type()
{
    return $this->hasMany(Job_type::class);

}
public function people()
{
    return $this->hasMany(People::class);

}


}
