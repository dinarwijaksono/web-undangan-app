<?php

namespace Tests\Feature\Service;

use App\Models\User;
use App\Services\InvitationService;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
