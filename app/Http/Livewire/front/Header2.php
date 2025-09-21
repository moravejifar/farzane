<?php

namespace App\Http\Livewire\front;

use Livewire\Component;

class Header2 extends Component
{
    // protected $listeners = ['refreshHeader' => '$refresh'];
    public $char='';
    public $issearching=false;
    public function mount(){


    }
    public function render()
    {
        return view('livewire.front.header2');
    }
    public function changed()
    {
        $this->issearching=true;
    }
}
