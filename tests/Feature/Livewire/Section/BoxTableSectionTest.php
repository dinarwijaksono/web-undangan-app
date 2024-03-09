<?php

namespace Tests\Feature\Livewire\Section;

use App\Livewire\Section\BoxTableSection;
use App\Models\Section;
use App\Models\User;
use Database\Seeders\SectionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxTableSectionTest extends TestCase
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
        Livewire::test(BoxTableSection::class)
            ->assertStatus(200);
    }

    public function test_renders_success_with_data()
    {
        Section::insert([
            'locate_tumb' => 'example-section',
            'created_at' => round(microtime(true) * 1000),
            'updated_at' => round(microtime(true) * 1000),
        ]);

        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);
        $this->seed(SectionSeeder::class);

        Livewire::test(BoxTableSection::class)
            ->assertStatus(200)
            ->assertSee('example-section');
    }
}
