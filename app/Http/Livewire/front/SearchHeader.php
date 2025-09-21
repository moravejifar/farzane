<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SearchHeader extends Component
{
    public $char='';
    public function render()
    {
        return view('livewire.front.search-header');
    }
}
