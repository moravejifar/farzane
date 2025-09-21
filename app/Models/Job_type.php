<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'job_type';

    public function employee()
    {
      return $this->belongsTo(Employee::class);

    }


}

