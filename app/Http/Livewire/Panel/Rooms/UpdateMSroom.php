<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\RoomStatusHistory;
use App\Models\RoomStatus;
use Illuminate\Support\Facades\Auth;


class UpdateMSroom extends Component
{







    public $historyId = null;
    public $record;
    public $status_id;
    public $StartDateTime;
    public $EndDateTime;
    // data array used by the blade (wire:model="data.FieldName")
    public $data = [];

    /**
     * Accept optional historyId when mounting (passed from parent with @livewire([...]))
     */
    public function mount($historyId = null)
    {
        $this->historyId = $historyId;

        if ($this->historyId) {
            $this->record = RoomStatusHistory::find($this->historyId);
            if ($this->record) {
                $this->status_id = $this->record->StatusID;
                $this->StartDateTime = $this->record->StartDateTime;
                $this->EndDateTime = $this->record->EndDateTime;

                // populate the data array used by the form
                $this->data = [
                    'StatusID' => $this->record->StatusID,
                    'StartDateTime' => $this->record->StartDateTime,
                    'EndDateTime' => $this->record->EndDateTime,
                ];
            }
        }
    }
    public function render()
    {
        // provide statuses to the blade so the select options are available
        $statuses = RoomStatus::all();

        return view('livewire.panel.rooms.update-m-sroom', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Save updates to the RoomStatusHistory record.
     */
    public function update()
    {
        $this->validate([
            'data.StatusID' => 'required|exists:room_status,status_id',
            'data.StartDateTime' => 'nullable',
            'data.EndDateTime' => 'nullable',
        ]);

        if (! $this->historyId) {
            session()->flash('error', 'شناسه رکورد برای ویرایش مشخص نشده است.');
            return;
        }

        $record = RoomStatusHistory::find($this->historyId);
        if (! $record) {
            session()->flash('error', 'رکورد پیدا نشد.');
            return;
        }

        try {
            $record->StatusID = $this->data['StatusID'];
            $record->StartDateTime = $this->data['StartDateTime'];
            $record->EndDateTime = $this->data['EndDateTime'];
            $record->UpdatedBy = Auth::id() ?? $record->UpdatedBy;
            $record->save();

            session()->flash('success', 'تغییرات با موفقیت ذخیره شد.');

            // tell parent to close edit form (parent listens for cancelEdit)
            $this->emitUp('cancelEdit');
        } catch (\Exception $e) {
            logger()->error('UpdateMSroom update error: '.$e->getMessage());
            session()->flash('error', 'خطا هنگام ذخیره تغییرات.');
        }
    }
}
