<?php

namespace App\Http\Livewire\front;

use Livewire\Component;

class SearchHeader extends Component
{
    public function doSearch()
{
    return redirect('/search/0/' . $this->char);
}
    public $char='';
    public function render()
    {
        return view('livewire.front.search-header');
    }
}
