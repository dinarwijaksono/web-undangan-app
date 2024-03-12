<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SectionController extends Controller
{
    public function setUp()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email
        ]);
    }

    public function index()
    {
        self::setUp();

        Log::info('/section success', [
            'class' => SectionController::class
        ]);

        return view('section.index');
    }

    public function show(?int $sectionId)
    {
        self::setUp();

        Log::info('/section success', [
            'class' => SectionController::class
        ]);

        $data = ['sectionId' => $sectionId];

        return view('section.show', $data);
    }
}
