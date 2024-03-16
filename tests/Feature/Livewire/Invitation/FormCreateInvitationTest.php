<?php

namespace Tests\Feature\Livewire\Invitation;

use App\Livewire\Invitation\FormCreateInvitation;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormCreateInvitationTest extends TestCase
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
        Livewire::test(FormCreateInvitation::class)
            ->assertStatus(200);
    }

    public function test_do_create_invitation_success()
    {
        $name = 'test-' . random_int(1, 9999999);

        Livewire::test(FormCreateInvitation::class)
            ->set('name', $name)
            ->call('doCreateInvitation');

        $this->assertDatabaseHas('invitations', [
            'name' => $name
        ]);
    }

    public function test_do_create_invitation_failed_validation()
    {
        $name = '';

        Livewire::test(FormCreateInvitation::class)
            ->set('name', $name)
            ->call('doCreateInvitation')
            ->assertHasErrors(['name']);
    }
}
