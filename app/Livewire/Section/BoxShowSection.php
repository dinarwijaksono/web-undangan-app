<?php

namespace App\Livewire\Section;

use App\Services\SectionService;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class BoxShowSection extends Component
{
    public $sectionId;

    public $section;

    protected $sectionService;

    public function booted()
    {
        $this->sectionService = App::make(SectionService::class);

        $this->section = $this->sectionService->getById($this->sectionId);
    }

    public function render()
    {
        return view('livewire.section.box-show-section');
    }
}
