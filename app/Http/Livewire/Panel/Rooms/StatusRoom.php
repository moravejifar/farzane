<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\Room_status;

class StatusRoom extends Component
{
    public $selected_id,$update;
    public $isUpdating=false;
    public $isUploading=false;
    public $data=[
        "status_id"=>"",
        "status_name"=>"",
        "status_description"=>"",

    ];
    protected $rules=[
        'data.status_id'=>'required',
        'data.status_name'=>'required|min:2|unique:room_status,status_name',
        // 'data.status_description'=>'required',
    ];
    public function handleCreate()
    {
        $this->validate();
        $sRoom=new Room_status;
        $sRoom->status_id=$this->data['status_id'];
        $sRoom->status_name=$this->data['status_name'];
        $sRoom->status_description=$this->data['status_description'];

        $sRoom->save();
        $this->emit('showAlert', "وضعیت اتاق با موفقیت اضافه شد.");

        $this->resetInput();
    }
    public  function handleUpdate()
    {
        $this->validate([
            'data.status_id'=>'required',
            'data.status_name'=>'required|min:2',
        ]);

        if($this->selected_id){
       $updateStatusRoom= Room_status::findOrFail($this->selected_id);

       $updateStatusRoom->update([
                'status_id'=>$this->data['status_id'],
                'status_name'=>$this->data['status_name'],
                'status_description'=>$this->data['status_description'],
        ]);

        $this->emit('showAlert', "ویرایش وضعیت اتاق با موفقیت انجام شد.");
        // return redirect('/panel/rooms/roomType');
      }
   }
   public function handleEdit($status_id)
   {
       $this->resetInput();
       $record=Room_status::findOrFail($status_id);
       $this->selected_id=$status_id;
       $this->data['status_id']=$status_id;
       $this->data['status_name']=$record->status_name;
       $this->data['status_description']=$record->status_description;
       $this->isUpdating=true;

   }

   public function resetInput()
   {
       $this->data['status_id']=null;
       $this->data['status_name']=null;
       $this->data['status_description']=null;
   }
   public function destroy($status_id)
   {

           $record=Room_status::where('status_id',$status_id);
           $record->delete();


   }
   public function mount() {
    $this->update=Room_status::all();

}

    public function render()
    {
        return view('livewire.panel.rooms.status-room')
        ->layout('layouts.panel');
    }
    public function changed()
    {
        $this->isUploading=true;
    }
}
