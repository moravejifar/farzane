<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_status extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_id',
        'status_name',
        'status_description',
    ];
    public $timestamps = false;
    protected $table = 'room_status';
    protected $primaryKey = 'status_id';

    public function room()
    {
      return $this->hasMany(Room::class,'status_id');

    }
}
