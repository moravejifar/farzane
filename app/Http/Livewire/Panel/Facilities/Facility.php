<?php

namespace App\Http\Livewire\Panel\Facilities;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Facility as Modelfacility;
use App\Models\Facility_type ;
use Livewire\WithFileUploads;

class Facility extends Component
{
    use WithFileUploads;
    public  $facility_image,$selected_id,$update,$facilitytype_name,$facilitytype_id;
    public $type;
    public $isUpdating=false;
    public $isUploading=false;
    public $data=[
        "facilitytype_id"=>"",
        "facility_id"=>"",
        "facility_name"=>"",
        "facility_loc"=>"",
        "facility_image"=>"",
        "facility_alt"=>"",
        "facility_rank"=>"",
    ];
    protected $rules=[
        'data.facility_id'=>'required|min:1|unique:Facility,facility_id',
        'data.facilitytype_id'=>'required',
        // 'facility_image'=>'image| max:2024',
        'data.facility_name'=>'required|min:3|unique:Facility,facility_id',
        'data.facility_loc'=>'required',
        'data.facility_alt'=>'required',
        'data.facility_rank'=>'required',

    ];
    public function handleCreate()
    {
        // dd('1');
        $this->validate();
        // dd('1');
        $facility_image=$this->facility_image;
        // $facility_image=$this->facility_image;

        if (is_file($facility_image))
        {    $this->isUploading="true";
             $facility_image=$this->facility_image->store('public/images/facility');
        }

        $Cfacility=new Modelfacility;
        $Cfacility->facility_id=$this->data['facility_id'];
        $Cfacility->facilitytype_id=$this->data['facilitytype_id'];
        $Cfacility->facility_name=$this->data['facility_name'];
        $Cfacility->facility_image=$this->data['facility_image'];
        $Cfacility->facility_loc=$this->data['facility_loc'];
        $Cfacility->facility_alt=$this->data['facility_alt'];
        $Cfacility->facility_rank=$this->data['facility_rank'];

    if ($this->isUploading){
        $Cfacility->facility_image="/storage/images/facility/". explode("/", $facility_image)[3];}
    else {$Cfacility->facility_image="/storage/images/facility/1.jpg";}

        $Cfacility->save();
        $this->emit('showAlert', "مسهله با موفقیت اضافه شد.");
        $this->update=Modelfacility::all();

        $this->resetInput();
    }
    public  function handleUpdate()
    {
        // dd('1');
        $facility_image=$this->facility_image;
        // $this->validate();
        // $this->validate([
        //     'data.facility_id' => [
        //         Rule::unique('facility', 'facility_id')->ignore($this->data['facility_id'])],
        // ]);

    if (is_file($facility_image))
    {    $this->isUploading="true";
         $facility_image=$this->facility_image->store('public/images/facility');
        }
    else {$facility_image="/storage/images/facility/1.jpg";}

        if($this->selected_id){
       $updateFacility= Modelfacility::findOrFail($this->selected_id);

       $facility_image=$this->facility_image->store('public/images/facility');

       $updateFacility->update([
                // 'facilitytype_id'=>$this->selected_id,
                'facility_id'=>$this->selected_id,
                'facilitytype_id'=>$this->data['facilitytype_id'],
                'facility_name'=>$this->data['facility_name'],
                'facility_loc'=>$this->data['facility_loc'],
                'facility_alt'=>$this->data['facility_alt'],
                'facility_rank'=>$this->data['facility_rank'],
                'facility_image'=>"/storage/images/facility/". explode("/", $facility_image)[3],

        ]);
        // dd('1');
        $this->emit('showAlert', "ویرایش  تسهیلات با موفقیت انجام شد.");
        return redirect('/panel/facilities/facility');
        // dd('1');
      }
   }
    public function handleEdit($facility_id)
    {
        // dd('1');
        $this->resetInput();
        $record=Modelfacility::findOrFail($facility_id);
        $this->selected_id=$facility_id;
        $this->data['facility_id']=$record->facility_id;
        $this->data['facilitytype_id']=$record->facilitytype_id;
        $this->facilitytype_name=$record->facility_type->facility_type_name;
        // dd($this->facilitytype_name);
        // facility_type->facility_type_name;
        // $this->facility_id=$record->facilitytype_id;
        $this->data['facility_name']=$record->facility_name;
        $this->data['facility_loc']=$record->facility_loc;
        $this->data['facility_alt']=$record->facility_alt;
        $this->facility_image=$record->facility_image;
        $this->data['facility_rank']=$record->facility_rank;
        $this->isUpdating=true;

    }
    public function resetInput()
    {
        $this->data['facility_name']=null;
        $this->data['facility_id']=null;
        $this->data['facilitytype_id']=null;
        $this->data['facility_loc']=null;
        $this->facility_image=null;
        $this->data['facility_rank']=null;
        $this->data['facility_alt']=null;

    }
    public function destroy($facility_id)
    {

            $record=Modelfacility::where('facility_id',$facility_id);
            $record->delete();


    }

    public function mount() {
        $this->update=Modelfacility::all();
        $this->type=Facility_type::all();
    }




    public function render()
    {
        return view('livewire.panel.facilities.facility')
        ->layout('layouts.panel');
    }
    public function changed()
    {
        $this->isUploading=true;
    }
}
