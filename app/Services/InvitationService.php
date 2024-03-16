<?php

namespace App\Services;

use App\Models\Invitation;
use Illuminate\Support\Facades\Log;

class InvitationService
{
    public function boot()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => SectionService::class,
        ]);
    }

    // create
    public function create(string $name): void
    {
        self::boot();

        try {

            $invitation = new Invitation();
            $invitation->name = $name;
            $invitation->created_at = round(microtime(true) * 1000);
            $invitation->updated_at = round(microtime(true) * 1000);

            $invitation->save();

            Log::info('create invitation success');
        } catch (\Throwable $th) {
            Log::error('create invitation success', [
                'exeption' => $th->getMessage()
            ]);
        }
    }
}
