<?php

namespace App\Http\Livewire\front\Index;

use Livewire\Component;
use App\Models\Facility_type;
use App\Models\Room_type;

class Search extends Component
{
    public $newRooms;
    public $newFacility_type;
    public $newFacility;
    public $results1;
    public $results2;
    public $results3;
    public  $countresults1;
    public  $countresults2;
    public  $countresults3;

    public $categories;
    public $catId;
    public $char = "";
    // public $issearching=false;


    public function mount($catId, $char = "")
    {
        // dd($catId,$char);
        $this->newRooms = Room_type::all();
        $this->newFacility_type = Facility_type::all();
        $this->newFacility = Facility_type::all();
        $this->catId = $catId;
        $this->char = $char;
        // $this->issetfa=false;
        // $this->issetro=false;
    }
    public function render()
    {

        if ($this->catId == 0) {

            $result = Room_type::where('room_name', 'like', '%' . $this->char . '%')
                ->orWhere('max_quest', 'like', '%' . $this->char . '%')
                ->orWhere('alt_image', 'like', '%' . $this->char . '%')
                ->orWhere('room_size', 'like', '%' . $this->char . '%')
                ->orWhere('description', 'like', '%' . $this->char . '%')
                ->get();
            // ->paginate(8);
            $this->results1 = $result;
            $this->countresults1 = count($this->results1);
            // dd($this->countresults1);
            // $this->issearching=true;

            // dd($this->results);
            $resultf = Facility_type::where('facility_type_name', 'like', '%' . $this->char . '%')
                ->orWhere('facility_loc', 'like', '%' . $this->char . '%')
                ->orWhere('alt_image', 'like', '%' . $this->char . '%')
                ->orWhere('facility_rank', 'like', '%' . $this->char . '%')
                ->orWhere('description', 'like', '%' . $this->char . '%')
                ->get();
            // ->paginate(8);
            $this->results2 = $resultf;
            $this->countresults2 = count($this->results2);
            // dd($this->countresults2);

            // $this->issearching=true;
            // if (is_object($this->results2))
            // {
            //     $this->issetfa=true;
            //   }
            //   else {$this->issetfa=false;}

            // dd($this->results2);

        } else {

            $result = Room_type::where([
                ['id', $this->catId],
                ['room_name', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['id', $this->catId],
                ['alt_image', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['id', $this->catId],
                ['description', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['id', $this->catId],
                ['room_size', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['id', $this->catId],
                ['max_quest', 'like', '%' . $this->char . '%'],
            ])->get();
            // ])->paginate(8);

            $this->results1 = $result;
            $this->countresults1 = count($this->results1);
            dd($this->countresults1);
            // $this->issearching=true;

            $resultf = Facility_type::where([
                ['facilitytype_id', $this->catId],
                ['facility_type_name', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['facilitytype_id', $this->catId],
                ['facility_loc', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['Facilitytype_id', $this->catId],
                ['alt_image', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['facilitytype_id', $this->catId],
                ['description', 'like', '%' . $this->char . '%'],
            ])->orWhere([
                ['facilitytype_id', $this->catId],
                ['facility_rank', 'like', '%' . $this->char . '%'],
            ])->get();
            // ])->paginate(8);

            $this->results2 = $resultf;
            $this->countresults2 = count($this->results2);
            // $this->issearching=true;

        }




        return view('livewire.front.index.search')
            ->layout('layouts.searchApp');
        // return view('livewire.front.index.search', ['rooms' => $rooms]);
    }
}
