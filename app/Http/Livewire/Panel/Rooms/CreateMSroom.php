<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomStatusHistory;
use Illuminate\Support\Facades\Auth;

class CreateMSroom extends Component
{
    public $rooms;              // لیست همه اتاق‌ها
    public $statuses;           // لیست همه وضعیت‌ها
    public $room_id = null;     // اتاق انتخاب‌شده
    public $selectedStatusId;   // وضعیت انتخاب‌شده
    public $currentStatusName;  // برای نمایش نام وضعیت فعلی اتاق

    public $data = [
        'StartDateTime' => null,
        'EndDateTime' => null,
    ];

    public function mount($room_id = null)
    {
        $this->rooms = Room::select('id', 'room_id', 'room_number', 'status_id')->get();
        $this->statuses = RoomStatus::select('status_id', 'status_name')->get();

        if ($room_id) {
            $this->room_id = $room_id;
            $this->loadRoomStatus();
        }
    }

    /**
     * وقتی کاربر اتاق را انتخاب کند، وضعیت فعلی‌اش را بارگذاری می‌کنیم
     */
    public function updatedRoomId($value)
    {
        $this->loadRoomStatus();
    }

    /**
     * متد برای گرفتن وضعیت فعلی اتاق از دیتابیس
     */
    protected function loadRoomStatus()
    {
        $room = Room::find($this->room_id);
        if ($room && $room->status_id) {
            $this->selectedStatusId = $room->status_id;
            $this->currentStatusName = optional(RoomStatus::find($room->status_id))->status_name;
        } else {
            $this->selectedStatusId = null;
            $this->currentStatusName = null;
        }
    }

    /**
     * ✅ ذخیره وضعیت جدید اتاق با کنترل نقش و ثبت کاربر تغییر دهنده
     */
    public function handleCreate()
    {
        \Log::info('🔥 handleCreate اجرا شد', ['user' => Auth::id()]);

        // dd('متد اجرا شد!');
        // 1️⃣ بررسی احراز هویت
        if (!Auth::check()) {
            \Log::info('⛔ کاربر لاگین نیست');

            session()->flash('error', 'برای تغییر وضعیت باید وارد شوید.');
            return;
        }

        $user = Auth::user();
        \Log::info('👤 نقش کاربر', ['role' => $user->role]);

        // 2️⃣ بررسی نقش کاربر
        // فرض بر اینه که ستون `role` در جدول users داری
        // مثلاً admin / receptionist
        if (!in_array($user->role, ['ادمین سایت', 'پذیرش', 'admin', 'receptionist'])) {
            \Log::info('🚫 کاربر مجاز نیست');

            session()->flash('error', 'شما اجازه تغییر وضعیت اتاق را ندارید.');
            return;
        }
        \Log::info('✅ کاربر مجاز است، ورود به validate');


        // 3️⃣ اعتبارسنجی داده‌ها
        $this->validate([
            'room_id' => 'required|exists:rooms,id',
            // 'selectedStatusId' => 'required|exists:room_status,status_id',
            // 'data.StartDateTime' => 'required|date',
            'data.StartDateTime' => 'required|string',
            'data.EndDateTime' => 'nullable|date|after_or_equal:data.StartDateTime',
        ]);
        \Log::info('✅ اعتبارسنجی انجام شد');


        $room = Room::find($this->room_id);
        if (!$room) {
            \Log::info('❌ اتاق پیدا نشد');

            session()->flash('error', 'اتاق انتخاب شده معتبر نیست.');
            return;
        }
        \Log::info('🏠 اتاق پیدا شد', ['room_id' => $room->id]);





        // 4️⃣ ثبت در جدول تاریخچه (RoomStatusHistory)
        $record = RoomStatusHistory::create([
            'RoomID' => $this->room_id,
            'StatusID' => $this->selectedStatusId,
            'StartDateTime' => $this->data['StartDateTime'],
            'EndDateTime' => $this->data['EndDateTime'],
            'UpdatedBy' => $user->id,
        ]);

        \Log::info('🟢 رکورد وضعیت اتاق ایجاد شد', ['record_id' => $record->id]);



        // 5️⃣ به‌روزرسانی وضعیت فعلی اتاق در جدول rooms
        $room->status_id = $this->selectedStatusId;
        $room->save();
        \Log::info('💾 وضعیت اتاق به‌روزرسانی شد');

        // 6️⃣ ریست فرم و نمایش پیام موفقیت
        $this->reset(['room_id', 'selectedStatusId', 'data']);
        $this->loadRoomStatus();
        session()->flash('success', 'وضعیت اتاق با موفقیت ثبت شد ✅');
        \Log::info('✅ همه‌چیز انجام شد!');
    }

    public function render()
    {
        return view('livewire.panel.rooms.create-m-sroom', [
            'rooms' => $this->rooms,
            'statuses' => $this->statuses,
        ]);
    }
}
