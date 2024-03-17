<?php

namespace App\Livewire\Invitation;

use App\Livewire\Components\Alert;
use App\Services\InvitationService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormCreateInvitation extends Component
{
    public $name;

    public $rules = [
        'name' => 'required'
    ];

    public function boot()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => FormCreateInvitation::class
        ]);
    }

    public function doCreateInvitation()
    {
        $this->validate();

        try {
            $invitationService = App::make(InvitationService::class);
            $invitationService->create($this->name);

            $this->name = '';

            session()->put('alertMessage', 'Berhasil membuat template undangan.');
            $this->dispatch('do-change-box-hidden')->to(Alert::class);
            $this->dispatch('do-create-invitation')->to(BoxShowAllInvitation::class);

            Log::info('do create invitation success');
        } catch (\Throwable $th) {
            Log::error('do create invitation failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.invitation.form-create-invitation');
    }
}
