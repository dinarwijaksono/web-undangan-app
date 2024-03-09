<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SectionService
{
    public function setUp()
    {
        Log::withContext([
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => SectionService::class,
        ]);
    }

    // create
    public function create(?string $locateTumb): void
    {
        self::setUp();

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


    // read
    public function getAll(): Collection
    {
        self::setUp();

        try {
            $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
                ->orderBy('created_at')
                ->get();

            Log::info('get all section successs');

            return collect($getSection);
        } catch (\Throwable $th) {
            Log::error('get all section failed', [
                'exeption' => $th->getMessage()
            ]);

            return collect([]);
        }
    }
}
