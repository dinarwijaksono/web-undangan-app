<?php

namespace Tests\Feature\Livewire\Invitation;

use App\Livewire\Invitation\BoxShowAllInvitation;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxShowAllInvitationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $user = User::select('*')->first();
        $this->actingAs($user);
    }

    public function test_renders_successfully()
    {
        Livewire::test(BoxShowAllInvitation::class)
            ->assertStatus(200);
    }
}
