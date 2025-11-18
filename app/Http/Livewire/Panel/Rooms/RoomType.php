<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\Room_type;
use Livewire\WithFileUploads;
class RoomType extends Component
{

    use WithFileUploads;
    public  $room_image,$selected_id,$update;
    public $isUpdating=false;
    public $isUploading=false;
    // public $troom_Arr;
    public $data=[
        "id"=>"",
        "room_name"=>"",
        "max_quest"=>"",
        // "room_image"=>"",
        "alt_image"=>"",
        "room_size"=>"",
        "description"=>"",
        "room_priceusd"=>"",
        "description"=>"",

    ];
    protected $rules=[
        // 'id'=>'required',
        // 'room_image'=>'image| max:2024',
        'data.room_name'=>'required|min:3|unique:room_type,room_name',
        'data.max_quest'=>'required',
        'data.alt_image'=>'required',
        'data.room_size'=>'required',
        // 'data.description'=>'required',
        'data.room_priceusd'=>'required',

    ];

    public function handleCreate()
    {
        $this->validate();
        $room_image=$this->room_image;

        if (isset($room_image))
        {    $this->isUploading="true";
             $room_image=$this->room_image->store('public/images/room_image');
        }
        //  $room_image=$this->room_image->store('public/images/room_image');
//    dd($this->room_image);

        $tRoom=new Room_type;
        $tRoom->room_name=$this->data['room_name'];
        $tRoom->max_quest=$this->data['max_quest'];
        $tRoom->alt_image=$this->data['alt_image'];
        $tRoom->room_size=$this->data['room_size'];
        $tRoom->room_image=$this->room_image;
        $tRoom->room_priceusd=$this->data['room_priceusd'];
        $tRoom->description=$this->data['description'];

    if ($this->isUploading){
        $tRoom->room_image="/storage/images/room_image/". explode("/", $room_image)[3];}
    else {$tRoom->room_image="/storage/images/room_image/1.jpg";}

        $tRoom->save();

        $this->emit('showAlert', "نوع اتاق با موفقیت اضافه شد.");
        // $this->$troom_Arr=Room_type::where('id',$this->data['id'])->get();

        $this->resetInput();
        $this->update=Room_type::all();

    }

    public  function handleUpdate()
    {
        // dd('1');
        $room_image=$this->room_image;
        $this->validate();
    if (is_file($room_image))
    {    $this->isUploading="true";
         $room_image=$this->room_image->store('public/images/room_image');
        }
    else {$room_image="/storage/images/room_image/1.jpg";}

        if($this->selected_id){
       $updateTypeRoom= Room_type::findOrFail($this->selected_id);

       $room_image=$this->room_image->store('public/images/room_image');

       $updateTypeRoom->update([
                'id'=>$this->selected_id,
                'room_name'=>$this->data['room_name'],
                'max_quest'=>$this->data['max_quest'],
                'alt_image'=>$this->data['alt_image'],
                'room_size'=>$this->data['room_size'],
                'description'=>$this->data['description'],
                'room_priceusd'=>$this->data['room_priceusd'],
                // if ($this->isUploading)
                // {'room_image'="/storage/images/room_image/". explode("/", $room_image)[3];}
                // else {'room_image'="/storage/images/room_image/1.jpg";}
                'room_image'=>"/storage/images/room_image/". explode("/", $room_image)[3],

        ]);
        // dd( $this->room_image);
        // dd($updateTypeRoom->room_name);
        // dd($this->data['room_name'] ) ;
        // $this->resetInput();
        // $this->isUpdating=false;
        // dd($room_image);
        $this->emit('showAlert', "ویرایش نوع اتاق با موفقیت انجام شد.");
        return redirect('/panel/rooms/roomType');
        // dd('1');
      }
   }
    public function handleEdit($id)
    {
        $this->resetInput();
        $record=Room_type::findOrFail($id);
        $this->selected_id=$id;
        $this->data['room_name']=$record->room_name;
        $this->data['max_quest']=$record->max_quest;
        $this->data['alt_image']=$record->alt_image;
        $this->room_image=$record->room_image;
        $this->data['room_size']=$record->room_size;
        $this->data['description']=$record->description;
        $this->data['room_priceusd']=$record->room_priceusd;
        $this->room_image=$record->room_image;


        $this->isUpdating=true;

    }

    public function resetInput()
    {
        $this->data['room_name']=null;
        $this->data['max_quest']=null;
        $this->data['alt_image']=null;
        $this->room_image=null;
        $this->data['room_size']=null;
        $this->data['description']=null;
        $this->data['room_priceusd']=null;

    }
    public function destroy($id)
    {

            $record=Room_type::where('id',$id);
            $record->delete();


    }

    public function mount() {
        $this->update=Room_type::all();

    }

    public function render()
    {

        return view('livewire.panel.rooms.room-type')
        ->layout('layouts.panel');
    }
    public function changed()
    {
        $this->isUploading=true;
    }

}
// User::where('id',$id)->delete();
// $this->newUsers= $this->newUsers->where('id', '!=', $id);
// // $this->emit('showAlert', "کاربر با موفقیت حذف شد.");
// // $this->session()->flash('status', 'کاربر به درستی ایجاد شد!');
// return redirect()->route('users');
