<?php

namespace App\Livewire\Section;

use App\Livewire\Components\Alert;
use App\Services\SectionService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ModalFormCreateSection extends Component
{
    public $locateTumb;

    public $boxHidden = true;

    protected $rules = [
        'locateTumb' => 'required'
    ];

    protected $listeners = [
        'do-change-box-hidden' => 'doChangeBoxHidden'
    ];

    protected $sectionService;

    public function booted()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => ModalFormCreateSection::class
        ]);

        $this->sectionService = App::make(SectionService::class);
    }

    public function doChangeBoxHidden()
    {
        $this->boxHidden = !$this->boxHidden;
    }

    public function doCreateSection()
    {
        $this->validate();

        try {
            $this->sectionService->create($this->locateTumb);

            Log::info('do create section success');

            session()->put('alertMessage', 'Section berhasil di buat.');

            $this->dispatch('do-change-box-hidden')->self();
            $this->dispatch('do-change-box-hidden')->to(Alert::class);
        } catch (\Throwable $th) {
            Log::error('do create section failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.section.modal-form-create-section');
    }
}
