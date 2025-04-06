<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('What email?');
        $name = $this->ask('What name?');
        $password = $this->ask('What password?');
        $project_id = $this->ask('What project ID?');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'token' => Str::random(40),
            'project_id' => $project_id,
        ]);

        $this->info("User {$user->name} created successfully!");
    }
}
