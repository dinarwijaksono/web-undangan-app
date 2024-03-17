<?php

namespace Tests\Feature\Livewire\Invitation;

use App\Livewire\Invitation\BoxModelAddPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxModelAddPageTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        parent::login();
    }

    public function test_renders_successfully()
    {
        Livewire::test(BoxModelAddPage::class)
            ->assertStatus(200);
    }
}
