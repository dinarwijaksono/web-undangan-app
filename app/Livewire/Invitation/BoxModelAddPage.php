<?php

namespace App\Livewire\Invitation;

use App\Services\InvitationService;
use App\Services\SectionService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BoxModelAddPage extends Component
{
    public $invitationId;

    public $boxHidden = true;

    public $sectionAll;

    protected $invitationService;

    public $listeners = [
        'do-change-box-to-hidden' => 'doChangeBoxToHidden',
        'do-change-box-to-show' => 'doChangeBoxToShow',
    ];

    public function boot()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => FormCreateInvitation::class
        ]);

        $sectionService = App::make(SectionService::class);
        $this->sectionAll = $sectionService->getAll();

        $this->invitationService = App::make(InvitationService::class);
    }

    public function doChangeBoxToHidden()
    {
        $this->boxHidden = true;
        $this->dispatch('do-change-box-to-show')->to(BoxShowInvitation::class);
    }

    public function doChangeBoxToShow()
    {
        $this->boxHidden = false;
    }

    public function doAddPage(int $sectionId)
    {
        try {
            $this->invitationService->addPage($this->invitationId, $sectionId);

            $this->dispatch('do-change-box-to-hidden')->self();

            Log::info('do add page success');
        } catch (\Throwable $th) {
            Log::error('do add page failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.invitation.box-model-add-page');
    }
}
