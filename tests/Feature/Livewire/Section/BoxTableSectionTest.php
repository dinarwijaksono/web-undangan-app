<?php

namespace Tests\Feature\Livewire\Section;

use App\Livewire\Section\BoxTableSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxTableSectionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(BoxTableSection::class)
            ->assertStatus(200);
    }
}
