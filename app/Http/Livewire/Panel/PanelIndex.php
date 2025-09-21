<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

class PanelIndex extends Component
{
    public function render()
    {
        return view('livewire.panel.panelindex')
        ->layout('layouts.panel');

    }
}
