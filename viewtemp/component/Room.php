<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\Room_type;
use App\Models\Room as ModelRoom;
use Livewire\WithFileUploads;
class Room extends Component
{
    use WithFileUploads;

    public  $selected_id,$room_name,$type,$roomname;
    public $isUpdating=false;
    public $isUploading=false;
    public $data=[
        "room_id"=>"",
        "id"=>"",
        "room_name"=>"",
        "status_id"=>"",
        "room_number"=>"",
        "floor_number"=>"",
        "description"=>"",

    ];
    protected $rules=[
        'data.room_id'=>'required|min:3|unique:room,room_id',
        'data.room_name'=>'required|min:3',
        'data.status_id'=>'required',
        'data.room_number'=>'required',
        'data.floor_number'=>'required',
        // 'data.description'=>'required',
    ];

    public function handleCreate()
    {
        $this->validate();
        $tRoomName= $this->data['room_name'];
        $tRoomId=RoomType::where('room_name', $tRoomName);
        $Room=new ModelRoom;
        $Room->room_id=$this->data['room_id'];
        $Room->id=$tRoomId->id;
        $Room->status_id=$this->data['status_id'];
        $Room->room_number=$this->data['room_number'];
        $Room->floor_number=$this->data['floor_number'];
        $Room->description=$this->data['description'];
        $Room->save();
        $this->emit('showAlert', " اتاق با موفقیت اضافه شد.");

        // $this->resetInput();
    }

    public  function handleUpdate()
    {
        $this->validate();

        if($this->selected_id){
       $updateRoom= ModelRoom::findOrFail($this->selected_id);
       $RoomTypeName=$this->data['room_name'];
       $tRoomId=RoomType::where('room_name',$RoomTypeName );
    //    $RoomId=$tRoomId->id;
       $updateRoom->update([
                'room_id'=>$this->selected_id,
                'id'=>$tRoomId->id,
                'status_id'=>$this->data['status_id'],
                'room_number'=>$this->data['room_number'],
                'floor_number'=>$this->data['floor_number'],
                'description'=>$this->data['description'],
        ]);

        $this->emit('showAlert', "ویرایش اتاق با موفقیت انجام شد.");
        return redirect('/panel/rooms/room');
      }
   }
    public function handleEdit($room_id)
    {
        $this->resetInput();
        $record=ModelRoom::findOrFail($room_id);
        $this->selected_id=$room_id;
        $this->data['room_id']=$record->room_id;
        $this->data['id']=$record->id;
        $this->data['status_id']=$record->status_id;
        $this->data['room_number']=$record->room_number;
        $this->data['floor_number']=$record->floor_number;
        $this->data['description']=$record->description;

        $this->isUpdating=true;

    }

    public function resetInput()
    {
        $this->data['room_id']=null;
        $this->data['id']=null;
        $this->data['room_name']=null;
        $this->data['status_id']=null;
        $this->data['room_number']=null;
        $this->data['floor_number']=null;
        $this->data['description']=null;

    }
    public function destroy($room_id)
    {

            $record=ModelRoom::where('room_id',$room_id);
            $record->delete();


    }

    public function mount() {
        $this->roomname=ModelRoom::all();
        // $this->roomname=ModelRoom::where('room_id',$this->data['room_id']);
        $this->type=RoomType::all();


    }

    public function render()
    {

        return view('livewire.panel.rooms.room')
        ->layout('layouts.panel');
    }
    public function changed()
    {
        $this->isUploading=true;
    }

}

