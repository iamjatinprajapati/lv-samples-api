<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Console\Command;

class RefereshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:refresh:db";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('migrate:fresh');
        $this->info('Creating a user');
        $user = User::create([
            'name' => 'Jatin Prajapati',
            'email' => 'jatin@jprajapati.in',
            'password' => 'jatin@123',
            'email_verified_at' => now()
        ]);
        $users = User::factory()->count(10)->create();

        foreach($users as $user) {
            Todo::factory()->count(100)->create([
                'user_id' => $user->id
            ]);
        }

        $this->info('DONE');
    }
}
