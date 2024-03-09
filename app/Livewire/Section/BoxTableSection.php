<?php

namespace App\Livewire\Section;

use App\Livewire\Components\Alert;
use Livewire\Component;

use App\Livewire\Section\ModalFormCreateSection;
use App\Services\SectionService;
use Illuminate\Support\Facades\App;

class BoxTableSection extends Component
{
    public $boxHidden = false;

    public $listeners = [
        'do-change-box-hidden' => 'doChangeboxHidden'
    ];

    protected $sectionService;
    public $sectionAll;

    public function booted()
    {
        $this->sectionService = App::make(SectionService::class);

        $this->sectionAll = $this->sectionService->getAll();
    }

    public function doChangeboxHidden()
    {
        $this->boxHidden = !$this->boxHidden;
    }

    public function doShowModalFormCreateSection()
    {
        $this->dispatch('do-change-box-hidden')->self();
        $this->dispatch('do-change-box-hidden')->to(ModalFormCreateSection::class);
    }

    public function render()
    {
        return view('livewire.section.box-table-section');
    }
}
