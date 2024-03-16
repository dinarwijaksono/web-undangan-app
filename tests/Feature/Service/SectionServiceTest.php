<?php

namespace Tests\Feature\Service;

use App\Models\Section;
use App\Models\User;
use App\Services\SectionService;
use Database\Seeders\SectionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use stdClass;
use Tests\TestCase;

class SectionServiceTest extends TestCase
{
    public $sectionService;

    public function setUp(): void
    {
        parent::setUp();

        $this->sectionService = $this->app->make(SectionService::class);

        $this->seed(UserSeeder::class);
        $user = User::select('*')->where('email', env('USER_EMAIL_TEST'))->first();
        $this->actingAs($user);
    }

    public function test_create_success(): void
    {
        $locate = 'locate' . random_int(1, 9999);

        $this->sectionService->create($locate);

        $this->assertDatabaseHas('sections', [
            'locate_tumb' => $locate,
            'body' => null,
            'data' => null
        ]);
    }

    public function test_create_success_locate_is_null()
    {
        $locate = null;

        $this->sectionService->create($locate);

        $this->assertDatabaseHas('sections', [
            'locate_tumb' => $locate,
            'body' => null,
            'data' => null
        ]);
    }

    public function test_get_by_id_success()
    {
        $this->seed(SectionSeeder::class);

        $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
            ->first();

        $response = $this->sectionService->getById($getSection->id);

        $this->assertEquals($getSection, $response);
        $this->assertEquals($getSection->locate_tumb, $response->locate_tumb);
    }

    public function test_get_by_id_is_empty()
    {
        $response = $this->sectionService->getById(1234);

        $this->assertEquals($response, new stdClass());
    }

    public function test_get_all_success()
    {
        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);

        $response = $this->sectionService->getAll();

        $this->assertIsObject($response);

        $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();

        $getSection = collect($getSection);

        $this->assertEquals($response, $getSection);
        $this->assertEquals($response->count(), $getSection->count());
        $this->assertEquals($response->count(), 5);
    }


    public function test_update_body_success()
    {
        $this->seed(SectionSeeder::class);
        $getSection = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
            ->first();

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

        $this->sectionService->updateBody($getSection->id, $body, []);

        $section = Section::select('id', 'locate_tumb', 'body', 'data', 'created_at', 'updated_at')
            ->where('id', $getSection->id)
            ->first();

        $getBody = collect(collect(json_decode($section->body))[0])->toArray();

        $this->assertEquals($getBody, $body[0]);
    }
}
