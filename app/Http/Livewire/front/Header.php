<?php

namespace App\Http\Livewire\front;

use Livewire\Component;


class Header extends Component
{
    // protected $listeners = ['refreshHeader' => '$refresh'];
    public $char='';
    // public $issearching=true;
    public function mount(){
        if ($this->char==''){
            //  $this->issearching=false;
            }


    }
    public function render()
    {
        return view('livewire.front.header');
    }
    public function changed()
    {
        // $this->issearching=true;
    }
}
