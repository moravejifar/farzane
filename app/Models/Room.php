<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    use HasFactory;
    protected $primaryKey = 'room_id';
    public $timestamps = false;
    protected $table = 'rooms';
    protected $fillable = [
        'room_id',
        'id',
        'status_id',
        'room_number',
        'floor_number',
        'description',
    ];
    public function room_type()
{
    return $this->belongsTo(Room_type::class,'id');

}
public function room_status()
{
    return $this->belongsTo(Room_status::class,'status_id');

}

public function reservation()
{
  return $this->hasMany(Reservation::class);

}

}
