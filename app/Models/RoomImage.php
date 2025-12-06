<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomImage extends Model
{
    // این مدل به جدول 'room_images' متصل می شود (استاندارد لاراول)

    // فیلدهایی که قابل پر شدن هستند
    protected $fillable = [
        'room_type_id',
        'image_url',
        'caption',
        'image_order',
        'is_main'
    ];

    // اگر از گارد (guarded) استفاده می کنید، می توانید protected $guarded = []; را جایگزین کنید.

    /**
     * یک تصویر متعلق به یک نوع اتاق است.
     */
    public function roomType(): BelongsTo
    {
        // اتصال به مدل RoomType از طریق ستون room_type_id
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
