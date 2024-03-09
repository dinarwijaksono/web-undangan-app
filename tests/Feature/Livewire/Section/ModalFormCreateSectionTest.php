<?php

namespace Tests\Feature\Livewire\Section;

use App\Livewire\Section\ModalFormCreateSection;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalFormCreateSectionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $user = User::select('*')->where('email', env("USER_EMAIL_TEST"))->first();
        $this->actingAs($user);
    }

    public function test_renders_successfully()
    {
        Livewire::test(ModalFormCreateSection::class)
            ->assertStatus(200)
            ->assertSee('Buat Section')
            ->assertSee('Location tumb')
            ->assertSee('Simpan');
    }


    public function test_do_create_section_success()
    {
        $locateTumb = 'example-' . random_int(1, 9999);

        Livewire::test(ModalFormCreateSection::class)
            ->set('locateTumb', $locateTumb)
            ->call('doCreateSection')
            ->assertDispatched('do-change-box-hidden');

        $this->assertDatabaseHas('sections', [
            'locate_tumb' => $locateTumb,
            'body' => null,
            'data' => null
        ]);
    }


    public function test_do_create_seciton_failed_locate_tumb_is_require()
    {
        $locateTumb = null;

        Livewire::test(ModalFormCreateSection::class)
            ->set('locateTumb', $locateTumb)
            ->call('doCreateSection')
            ->assertHasErrors('locateTumb');

        $this->assertDatabaseMissing('sections', [
            'locate_tumb' => $locateTumb,
            'body' => null,
            'data' => null
        ]);
    }
}
