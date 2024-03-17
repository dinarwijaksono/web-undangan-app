<?php

namespace Tests\Feature\Livewire\Invitation;

use App\Livewire\Invitation\BoxShowInvitation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxShowInvitationTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(BoxShowInvitation::class)
            ->assertStatus(200);
    }
}
