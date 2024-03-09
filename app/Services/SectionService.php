<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Facades\Log;

class SectionService
{
    public function __construct()
    {
        Log::withContext([
            // 'user_id' => auth()->user()->id,
            // 'email' => auth()->user()->email,
            'class' => SectionService::class,
        ]);
    }

    // create
    public function create(?string $locateTumb): void
    {
        try {
            $section = new Section();
            $section->locate_tumb = $locateTumb;
            $section->body = null;
            $section->data = null;
            $section->created_at = round(microtime(true) * 1000);
            $section->updated_at = round(microtime(true) * 1000);

            $section->save();

            Log::info('create section success');
        } catch (\Throwable $th) {
            Log::error('create section failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }
}
