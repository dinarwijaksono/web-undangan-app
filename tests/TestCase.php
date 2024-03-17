<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'mysql-test']);

        DB::delete('delete from users');
        DB::delete('delete from sections');
        DB::delete('delete from pages');
        DB::delete('delete from invitation_to_pages');
        DB::delete('delete from invitations');
    }

    public function login()
    {
        $this->seed(UserSeeder::class);
        $user = User::select('*')->first();
        $this->actingAs($user);
    }
}
