<?php

namespace Tests\Feature\Service;

use App\Models\Invitation;
use App\Models\Page;
use App\Models\Section;
use App\Models\User;
use App\Services\InvitationService;
use App\Services\SectionService;
use Database\Seeders\InvitationSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class InvitationServiceTest extends TestCase
{
    public $invitationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->invitationService = $this->app->make(InvitationService::class);

        $this->seed(UserSeeder::class);
        $user = User::select('*')->first();
        $this->actingAs($user);
    }

    public function test_create_success(): void
    {
        $name = 'test-' . random_int(1, 9999);

        $this->invitationService->create($name);

        $this->assertDatabaseHas('invitations', [
            'name' => $name
        ]);
    }


    public function test_add_page_success()
    {
        $this->seed(SectionSeeder::class);
        $this->seed(InvitationSeeder::class);

        $section = Section::select('*')->first();
        $invitation = Invitation::select('*')->first();

        $body = [
            [
                'tag_name' => 'paragraph',
                'tag' => 'p',
                'tag_class' => 'p-2 m-2',
                'tag_style' => 'display: block;',
                'tag_content' => 'lorem ipsum dolar is amet'
            ],
            [
                'tag_name' => 'paragraph',
                'tag' => 'p',
                'tag_class' => 'p-2 m-2',
                'tag_style' => 'display: block;',
                'tag_content' => 'lorem ipsum dolar is amet'
            ],
        ];

        Section::where('id', $section->id)->update([
            'body' => $body,
            'data' => [],
            'updated_at' => round(microtime(true) * 1000)
        ]);

        $section = Section::select('*')->first();

        $sectionService = $this->app->make(SectionService::class);
        $sectionService->updateBody($section->id, $body, [['tag' => 'h1']]);

        $this->invitationService->addPage($invitation->id, $section->id);

        $this->assertDatabaseHas('pages', [
            'name' => $section->locate_tumb
        ]);

        $page = Page::select('*')->first();

        $this->assertDatabaseHas('invitation_to_pages', [
            'invitation_id' => $invitation->id,
            'page_id' => $page->id
        ]);
    }


    public function test_get_by_id_success()
    {
        $this->seed(InvitationSeeder::class);
        $this->seed(InvitationSeeder::class);
        $this->seed(InvitationSeeder::class);

        $invitation = Invitation::select('*')->first();

        $response = $this->invitationService->getById($invitation->id);

        $this->assertEquals($invitation, $response);
    }


    public function test_get_all_success()
    {
        $this->seed(InvitationSeeder::class);
        $this->seed(InvitationSeeder::class);
        $this->seed(InvitationSeeder::class);

        $response = $this->invitationService->getAll();

        $this->assertEquals($response->count(), 3);
        $this->assertDatabaseCount('invitations', 3);
    }
}
