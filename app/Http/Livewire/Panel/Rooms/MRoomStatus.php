<?php

namespace App\Http\Livewire\Panel\Rooms;

// namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RoomStatusHistory;
use App\Models\Room;
use App\Models\RoomStatus;

class MRoomStatus extends Component
{
    public $selected_id, $update;
    public $isUpdating = false;

    public $isUploading = false;
    public $data = [
        "status_id" => "",
        "room_id" => "",
        "HistoryID" => "",
        "StartDateTime" => "",
        "EndDateTime" => "",
        "UpdatedBy" => "",
        // "status_name" => "",

    ];
    public $editingHistory = null; // رکورد در حال ویرایش
    public $editingHistoryId = null;

    public $room_id;
    public $status_id;
    public $updated_by;
    public $rooms;
    public $statuses;

    public $history = []; // تاریخچه وضعیت‌ها
    protected $listeners = ['cancelEdit' => 'cancelEdit'];

    /**
     * Mount the component.
     * Accept an optional room id so the component can be mounted with a parameter
     * (e.g. from a route or when used as <livewire:... :id="$id" />).
     */
    public function mount($id = null)
    {
        $this->rooms = Room::all();
        $this->statuses = RoomStatus::all();
        $this->update = RoomStatusHistory::all();

        // If an id is provided when mounting, set the room and load its history
        if ($id) {
            $this->room_id = $id;
            $this->loadHistory();
        }
    }



    public function updatedRoomId($value)
    {
        $this->loadHistory();
    }

    public function loadHistory()
    {
        if ($this->room_id) {
            $this->history = RoomStatusHistory::where('RoomID', $this->room_id)
                ->orderByDesc('StartDateTime')
                ->with('status')
                ->get();
        } else {
            $this->history = [];
        }
    }
    //   * اضافه کردن وضعیت جدید برای یک اتاق

    public function handleCreate()

    {
        $this->validate();
        $mRoom = new RoomStatusHistory;

        RoomStatusHistory::addStatus($this->room_id, $this->status_id, $this->updated_by);

        // session()->flash('message', 'وضعیت اتاق با موفقیت ثبت شد.');

        $this->reset(['room_id', 'status_id']);
        $this->loadHistory();
    }

    public function edit($id = null)
    {
        $this->editingHistoryId = $id;
        $this->isUpdating = true;
    }


    public function cancelEdit()
    {
        $this->editingHistoryId = null;
        $this->isUpdating = false;
    }

    /**
     * Delete a room status history record.
     * Called from UI via Livewire action (wire:click="delete({{ $id }})").
     */
    // make id optional to avoid container DI errors when Livewire doesn't send the param
    public function delete($id = null)
    {
        if (! $id) {
            // defensive: log missing id and return a user-friendly message
            logger()->warning('MRoomStatus::delete called without id. Falling back to editingHistoryId.', ['editingHistoryId' => $this->editingHistoryId]);
            $id = $this->editingHistoryId;
            if (! $id) {
                session()->flash('error', 'شناسه رکورد برای حذف مشخص نشده است.');
                return;
            }
        }

        $record = RoomStatusHistory::find($id);

        if (! $record) {
            session()->flash('error', 'رکورد مورد نظر پیدا نشد.');
            return;
        }

        try {
            $record->delete();
            $this->loadHistory();
            session()->flash('message', 'رکورد با موفقیت حذف شد.');
        } catch (\Exception $e) {
            // Log available in laravel.log; user sees a flash message.
            logger()->error('Failed to delete RoomStatusHistory: '.$e->getMessage());
            session()->flash('error', 'حذف رکورد با خطا مواجه شد.');
        }
    }

    public function render()
    {
        // $histories = RoomStatusHistory::with(['status', 'updatedBy'])->latest()->get();
        $histories = RoomStatusHistory::with(['status', 'updatedBy', 'room'])->latest()->get();

        return view('livewire.panel.rooms.m-room-status', [
            'histories' => $histories,
            'editingHistoryId' => $this->editingHistoryId,

        ])->layout('layouts.panel');
        // return view('livewire.panel.rooms.m-room-status');
        // return view('livewire.panel.rooms.m-room-status')->layout('layouts.panel');
    }



}
