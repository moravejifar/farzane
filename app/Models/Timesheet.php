<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'timesheet';

    public function employee()
{
    return $this->hasMany(Employee::class);

}
}
