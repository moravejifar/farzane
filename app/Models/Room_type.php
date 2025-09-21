<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'room_name',
        'max_quest',
        'alt_image',
        'room_size',
        'room_priceusd',
        'room_image',
        'description',
    ];
    public $timestamps = false;
    protected $table = 'room_type';
    public function room()
    {

      return $this->hasMany(Room::class,'id');

    }
}
