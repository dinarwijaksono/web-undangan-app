<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use stdClass;

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
    public function getById(int $id): object
    {
        self::setUp();

        try {
            $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
                ->where('id', $id)
                ->first();

            Log::info('get section by id success');

            return $getSection;
        } catch (\Throwable $th) {

            Log::error('get section by id failed', [
                'exeption' => $th->getMessage()
            ]);

            return new stdClass();
        }
    }

    public function getAll(): Collection
    {
        self::setUp();

        try {
            $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
                ->orderBy('created_at', 'desc')
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

    // update
    public function updateBody(int $sectionId, $body, $data)
    {
        self::setUp();

        try {
            Section::where('id', $sectionId)->update([
                'body' => $body,
                'data' => $data,
                'updated_at' => round(microtime(true) * 1000)
            ]);

            Log::info('update body section success');
        } catch (\Throwable $th) {
            Log::error('update body section failed', [
                'message' => $th->getMessage()
            ]);
        }
    }
}
