<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public $boxHidden = true;

    protected $listeners = [
        'do-change-box-hidden' => 'doChangeBoxHidden',
        'show-alert' => 'render'
    ];

    public function doChangeBoxHidden()
    {
        $this->boxHidden = !$this->boxHidden;

        $this->dispatch('show-alert');
    }

    public function doCloseAlert()
    {
        session()->forget('alertMessage');

        $this->dispatch('do-change-box-hidden')->self();
    }

    public function render()
    {
        return view('livewire.components.alert');
    }
}
