<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class RoomStatusHistory extends Model
{
    use HasFactory;
    protected $table = 'room_status_history';
    protected $primaryKey = 'HistoryID';
    public $timestamps = true;

    protected $fillable = [
        'RoomID',
        'StatusID',
        'StartDateTime',
        'EndDateTime',
        'UpdatedBy',
    ];

    protected $dates = [
        'StartDateTime',
        'EndDateTime',
        'created_at',
        'updated_at',
    ];

    /**
     * ارتباط با جدول اتاق
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'RoomID', 'id');
    }

    /**
     * ارتباط با جدول وضعیت‌ها
     */

    public function status(): BelongsTo
    {
        return $this->belongsTo(RoomStatus::class, 'StatusID', 'status_id');
    }


    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UpdatedBy', 'id');
    }


    public function scopeEditable($query)
    {
        return $query->whereNull('EndDateTime')
            ->orWhere('EndDateTime', '>=', Carbon::now()->subDay());
    }


public function isEditable()
{
    // فقط در صورتی قابل ویرایش است که تاریخ پایان (EndDateTime) نداشته باشد (null باشد)
    return is_null($this->EndDateTime);
}
    // public function isEditable()
    // {
    //     return is_null($this->EndDateTime);
    // }
    // public function isEditable()
    // {
    //     return is_null($this->EndDateTime) || now()->lessThan($this->EndDateTime);
    // }



    /**
     * گرفتن وضعیت فعلی یک اتاق
     */
    // public static function currentStatus($roomId)
    // {
    //     return self::where('RoomID', $roomId)
    //         ->whereNull('EndDateTime')
    //         ->first();
    // }

    /**
     * اضافه کردن وضعیت جدید برای یک اتاق
     */
    // public static function addStatus($roomId, $statusId, $updatedBy)
    // {
    //     // بستن وضعیت قبلی
    //     $current = self::currentStatus($roomId);
    //     if ($current) {
    //         $current->EndDateTime = now();
    //         $current->save();
    //     }

    //     // اضافه کردن وضعیت جدید
    //     return self::create([
    //         'RoomID' => $roomId,
    //         'StatusID' => $statusId,
    //         'StartDateTime' => now(),
    //         'EndDateTime' => null,
    //         'UpdatedBy' => $updatedBy,
    //     ]);
    // }
}
