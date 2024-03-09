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
            ->orderBy('created_at')
            ->get();

        $getSection = collect($getSection);

        $this->assertEquals($response, $getSection);
        $this->assertEquals($response->count(), $getSection->count());
        $this->assertEquals($response->count(), 5);
    }
}
