<?php

namespace App\Livewire\Invitation;

use App\Services\InvitationService;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class BoxShowAllInvitation extends Component
{
    public $invitationAll;

    public $listeners = [
        'do-create-invitation' => 'render'
    ];

    public function boot()
    {
        $invitationService = App::make(InvitationService::class);

        $this->invitationAll = $invitationService->getAll();
    }

    public function render()
    {
        return view('livewire.invitation.box-show-all-invitation');
    }
}
