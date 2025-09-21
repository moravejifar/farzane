<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function room()
    {
      return $this->belongsTo(Room::class);

    }
}
