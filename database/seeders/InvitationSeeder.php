<?php

namespace Database\Seeders;

use App\Models\Invitation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invitation = new Invitation();
        $invitation->name = 'test-' . random_int(1, 999999);
        $invitation->created_at = round(microtime(true) * 1000);
        $invitation->updated_at = round(microtime(true) * 1000);

        $invitation->save();
    }
}
