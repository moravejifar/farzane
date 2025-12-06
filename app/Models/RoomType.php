<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomImage; // 👈 خطی که باید اضافه شود


class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'room_name',
        'max_quest',
        // 'alt_image',
        'room_size',
        'room_priceusd',
        // 'room_image',
        'description',
    ];
    public $timestamps = false;
    protected $table = 'room_type';

    public function room()
    {

      return $this->hasMany(Room::class,'id');

    }
    public function images(): HasMany
    {
        // اتصال به مدل RoomImage و ستون room_type_id
        return $this->hasMany(RoomImage::class, 'room_type_id')
                    ->orderBy('image_order', 'asc');
    }

}
