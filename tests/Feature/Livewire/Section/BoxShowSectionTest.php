<?php

namespace Tests\Feature\Livewire\Section;

use App\Livewire\Section\BoxShowSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxShowSectionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(BoxShowSection::class)
            ->assertStatus(200);
    }
}
