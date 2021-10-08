<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()
            ->each(function($user) {
                Client::factory()->times(3)->create([
                    'user_id' => $user->id,
                ]);
            });

        User::factory()->create([
            'email' => 'user@email.com',
        ])->each(function($user) {
            Client::factory()->times(3)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
