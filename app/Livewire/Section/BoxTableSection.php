<?php

namespace App\Livewire\Section;

use Livewire\Component;

class BoxTableSection extends Component
{
    public function doShowModalFormCreateSection()
    {
        $this->dispatch('do-change-box-hidden')->to(ModalFormCreateSection::class);
    }

    public function render()
    {
        return view('livewire.section.box-table-section');
    }
}
