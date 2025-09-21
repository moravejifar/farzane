<?php

namespace App\Http\Livewire\Front\Index;

use Livewire\Component;

class SearchfaCard extends Component
{

    public $results2="";
    public function mount ($results2=""){

        $this->results2=$results2;
    }
    public function render()
    {
        return view('livewire.front.index.searchfa-card');
    }
}
