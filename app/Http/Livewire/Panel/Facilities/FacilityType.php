<?php

namespace App\Http\Livewire\Panel\Facilities;

use Livewire\Component;
use App\Models\Facility_type;
use Livewire\WithFileUploads;

class FacilityType extends Component
{
    use WithFileUploads;
    public  $facility_image,$selected_id,$update;
    public $isUpdating=false;
    public $isUploading=false;
    public $data=[
        "facilitytype_id"=>"",
        "facility_type_name"=>"",
        "facility_loc"=>"",
        "alt_image"=>"",
        "facility_rank"=>"",
        "description"=>"",
        "facility_priceusd"=>"",

    ];
    protected $rules=[
        // 'data.facilitytype_id'=>'required',
        'facility_image'=>'image| max:2024',
        'data.facility_type_name'=>'required|min:3|unique:Facility_type,facilitytype_id',
        'data.facility_loc'=>'required',
        'data.alt_image'=>'required',
        // 'data.facility_rank"'=>'required',
        // 'data.description'=>'required',
        'data.facility_priceusd'=>'required',

    ];
    public function handleCreate()
    {
        // dd('1');
        $this->validate();
        // dd('1');
        $facility_image=$this->facility_image;
        $facility_image=$this->facility_image;

        if (is_file($facility_image))
        {    $this->isUploading="true";
             $facility_image=$this->facility_image->store('public/images/facility_type');
        }

        $tfacility=new Facility_type;
        $tfacility->facility_type_name=$this->data['facility_type_name'];
        $tfacility->facility_loc=$this->data['facility_loc'];
        $tfacility->alt_image=$this->data['alt_image'];
        $tfacility->facility_rank=$this->data['facility_rank'];
        $tfacility->facility_priceusd=$this->data['facility_priceusd'];
        $tfacility->description=$this->data['description'];
    if ($this->isUploading){
        $tfacility->facility_image="/storage/images/facility_type/". explode("/", $facility_image)[3];}
    else {$tfacility->facility_image="/storage/images/facility_type/1.jpg";}

        $tfacility->save();
        $this->emit('showAlert', "نوع تسهیلات با موفقیت اضافه شد.");

        $this->resetInput();
    }

    public  function handleUpdate()
    {
        // dd('1');
        $facility_image=$this->facility_image;
        $this->validate();
    if (is_file($facility_image))
    {    $this->isUploading="true";
         $facility_image=$this->facility_image->store('public/images/facility_type');
        }
    else {$facility_image="/storage/images/facility_type/1.jpg";}

        if($this->selected_id){
       $updateTypeFacility= Facility_type::findOrFail($this->selected_id);

       $facility_image=$this->facility_image->store('public/images/facility_type');

       $updateTypeFacility->update([
                'facilitytype_id'=>$this->selected_id,
                'facility_type_name'=>$this->data['facility_type_name'],
                'facility_loc'=>$this->data['facility_loc'],
                'alt_image'=>$this->data['alt_image'],
                'facility_rank'=>$this->data['facility_rank'],
                'description'=>$this->data['description'],
                'facility_priceusd'=>$this->data['facility_priceusd'],
                'facility_image'=>"/storage/images/facility_type/". explode("/", $facility_image)[3],

        ]);
        $this->emit('showAlert', "ویرایش نوع تسهیلات با موفقیت انجام شد.");
        return redirect('/panel/facilities/facility-type');
        // dd('1');
      }
   }
    public function handleEdit($facilitytype_id)
    {
        // dd('1');
        $this->resetInput();
        $record=Facility_type::findOrFail($facilitytype_id);
        $this->selected_id=$facilitytype_id;
        $this->data['facility_type_name']=$record->facility_type_name;
        $this->data['facility_loc']=$record->facility_loc;
        $this->data['alt_image']=$record->alt_image;
        $this->facility_image=$record->facility_image;
        $this->data['facility_rank']=$record->facility_rank;
        $this->data['description']=$record->description;
        $this->data['facility_priceusd']=$record->facility_priceusd;

        $this->isUpdating=true;

    }

    public function resetInput()
    {
        $this->data['facility_type_name']=null;
        $this->data['facility_loc']=null;
        $this->data['alt_image']=null;
        $this->facility_image=null;
        $this->data['facility_rank']=null;
        $this->data['description']=null;
        $this->data['facility_priceusd']=null;

    }
    public function destroy($facilitytype_id)
    {

            $record=Facility_type::where('facilitytype_id',$facilitytype_id);
            $record->delete();


    }

    public function mount() {
        $this->update=Facility_type::all();

    }



    public function render()
    {
        return view('livewire.panel.facilities.facility-type')
        ->layout('layouts.panel');
    }
    public function changed()
    {
        $this->isUploading=true;
    }
}
