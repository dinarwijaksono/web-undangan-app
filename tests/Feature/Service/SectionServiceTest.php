<?php

namespace Tests\Feature\Service;

use App\Models\User;
use App\Services\SectionService;
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
}
