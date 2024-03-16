<?php

namespace Tests\Feature\Livewire\Section;

use App\Livewire\Section\BoxShowSection;
use App\Models\Section;
use App\Models\User;
use Database\Seeders\SectionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxShowSectionTest extends TestCase
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
        $this->seed(SectionSeeder::class);
        $section = Section::select('*')->first();

        Livewire::test(BoxShowSection::class, ['sectionId' => $section->id])
            ->assertStatus(200);
    }
}
