<?php

namespace App\Http\Livewire\Panel\Rooms;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Room_type;
use App\Models\Room as ModelRooms;
use Livewire\WithFileUploads;
class Room extends Component
{
    use WithFileUploads;

    public  $selected_id,$room_name,$room_id,$roomname;
    public $type;
    public $isUpdating=false;
    public $isUploading=false;
    public $data=[
        "room_id"=>"",
        "id"=>"",
        "status_id"=>"",
        "room_number"=>"",
        "floor_number"=>"",
        "description"=>"",

    ];
    protected function rules()
    {
         return [
        'data.room_id'=>'required|unique:rooms,room_id',
        //  . $this->data['room_id'],
        'data.id'=>'required',
        'data.room_number'=>'required',
        'data.floor_number'=>'required',
        // 'data.description'=>'required',
    ];
}

    public function handleCreate()
    {
        // dd('1');
        $this->validate();
        $CRoom=new ModelRooms;
        $CRoom->room_id=$this->data['room_id'];
        // dd($CRoom->room_id);
        // dd($CRoom);
        // dd('1');
        $CRoom->id=$this->data['id'];
        $CRoom->status_id='1';
        $CRoom->room_number=$this->data['room_number'];
        $CRoom->floor_number=$this->data['floor_number'];
        $CRoom->description=$this->data['description'];
        $CRoom->save();
        $this->emit('showAlert', " اتاق با موفقیت اضافه شد.");

        // $this->resetInput();
    }

    public  function handleUpdate()
    {
        // $this->validate();
        $this->validate([
            'data.room_id' => [
                Rule::unique('rooms', 'room_id')->ignore($this->data['room_id'])],
                // 'data.room_id' => 'required|room_id|unique:rooms,room_id,'.$this->data['room_id'],
        ]);

        if($this->selected_id){
       $updateRoom= ModelRooms::findOrFail($this->selected_id);
    //    $RoomTypeName=$this->data['room_name'];
    //    $tRoomId=RoomType::where('room_name',$RoomTypeName );
    //    $RoomId=$tRoomId->id;
       $updateRoom->update([
                'room_id'=>$this->selected_id,
                // 'id'=>$tRoomId->id,
                'id'=>$this->data['id'],
                'status_id'=>'1',
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
        $record=ModelRooms::findOrFail($room_id);
        $this->selected_id=$room_id;
        $this->data['room_id']=$record->room_id;
        $this->data['id']=$record->id;
        $this->room_id=$record->id;
        $this->room_name=$record->room_type->room_name;
        // dd($this->room_name);
        $this->data['status_id']='1';
        $this->data['room_number']=$record->room_number;
        $this->data['floor_number']=$record->floor_number;
        $this->data['description']=$record->description;

        $this->isUpdating=true;

    }

    public function resetInput()
    {
        $this->data['room_id']=null;
        $this->data['id']=null;
        // $this->data['room_name']=null;
        $this->data['status_id']='1';
        $this->data['room_number']=null;
        $this->data['floor_number']=null;
        $this->data['description']=null;

    }
    public function destroy($room_id)
    {

            $record=ModelRooms::where('room_id',$room_id);
            $record->delete();
            $this->emit('showAlert', " اتاق با موفقیت حذف شد.");
            $this->resetInput();


    }

    public function mount() {
        $this->roomname=ModelRooms::all();
        // $this->roomname=ModelRoom::where('room_id',$this->data['room_id']);
        $this->type=Room_type::all();


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

