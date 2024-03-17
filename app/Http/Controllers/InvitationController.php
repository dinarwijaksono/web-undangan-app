<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InvitationController extends Controller
{
    public function boot()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email
        ]);
    }

    public function index()
    {
        self::boot();

        Log::info('/invitation success', [
            'class' => SectionController::class
        ]);

        return view('invitation.index');
    }


    public function show(int $invitationId)
    {
        self::boot();

        Log::info('/invitation success', [
            'class' => SectionController::class
        ]);

        $data['invitationId'] = $invitationId;

        return view('invitation.show-invitation', $data);
    }
}
