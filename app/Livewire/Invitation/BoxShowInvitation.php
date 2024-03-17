<?php

namespace App\Livewire\Invitation;

use Livewire\Component;

class BoxShowInvitation extends Component
{
    public $allPage;

    public $boxHidden = false;

    public $listeners = [
        'do-change-bos-to-hidden' => 'doChangeBoxToHidden',
        'do-change-box-to-show' => 'doChangeBoxToShow',
    ];

    public function doShowBoxAddPage()
    {
        $this->dispatch('do-change-bos-to-hidden')->self();
        $this->dispatch('do-change-box-to-show')->to(BoxModelAddPage::class);
    }

    public function doChangeBoxToHidden()
    {
        $this->boxHidden = true;
    }

    public function doChangeBoxToShow()
    {
        $this->boxHidden = false;
    }

    public function render()
    {
        return view('livewire.invitation.box-show-invitation');
    }
}
