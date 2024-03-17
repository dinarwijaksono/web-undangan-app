<?php

namespace App\Services;

use App\Models\Invitation;
use App\Models\InvitationToPage;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use stdClass;

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

    public function addPage(int $templateId, int $sectionId): void
    {
        self::boot();

        try {

            $getSection = Section::select('id', 'locate_tumb', 'body', 'data')
                ->where('id', $sectionId)
                ->first();

            $body = collect(json_decode($getSection->body));

            $pageId = DB::table('pages')
                ->insertGetId([
                    'name' => $getSection->locate_tumb,
                    'body' => $body,
                    'created_at' => round(microtime(true) * 1000),
                    'updated_at' => round(microtime(true) * 1000),
                ]);

            $invitationToPage = new InvitationToPage();
            $invitationToPage->invitation_id = $templateId;
            $invitationToPage->page_id = $pageId;
            $invitationToPage->created_at = round(microtime(true) * 1000);
            $invitationToPage->updated_at = round(microtime(true) * 1000);
            $invitationToPage->save();

            Log::info('add page success');
        } catch (\Throwable $th) {
            Log::error('add page failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }


    // read
    public function getById(): object
    {
        self::boot();

        try {

            $invitation = Invitation::select('id', 'name', 'created_at', 'updated_at')
                ->first();

            Log::info('get by id success');

            return $invitation;
        } catch (\Throwable $th) {
            Log::error('get by id failed', [
                'exeption' => $th->getMessage()
            ]);
        }
    }

    public function getAll(): Collection
    {
        self::boot();

        try {
            $invitation = Invitation::select('id', 'name', 'created_at', 'updated_at')
                ->orderBy('created_at', 'desc')
                ->get();

            Log::info('get all invitation success');

            return collect($invitation);
        } catch (\Throwable $th) {
            Log::error('get all invitation failed', [
                'exeption' => $th->getMessage()
            ]);

            return collect();
        }
    }
}
