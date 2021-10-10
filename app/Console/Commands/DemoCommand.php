<?php

namespace App\Console\Commands;

use App\Models\Goal;
use App\Models\Peership;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the application will everything needed for a good demo.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');

        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->ask('What should your password be?');

        $user = User::factory()->create([
            'name' => $name,
            'username' => Str::slug($name),
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Thanks, setting things up now!");

        $peers = User::factory()
            ->times(10)
            ->create()
            ->each(function($peer) use ($user) {
                $user->sendPeerRequestTo($peer);
            });
        
        $peers->each(function($peer) use ($user) {
            $peer->peer_requests->each(function(Peership $request) use ($user) {
                $request->acceptRequest($user);
            });
        });

        $goals = Goal::factory()
            ->times(10)
            ->create([
                'user_id' => $user->id,
            ]);        

        $this->info("\nGood to go, you can login using your email and password, have fun 💖");
    }
}
