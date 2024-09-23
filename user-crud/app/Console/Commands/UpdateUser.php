<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUser extends Command
{
    protected $signature = 'user:update {id} {name?} {email?} {password?}';
    protected $description = 'Update an existing user';

    public function handle()
    {
        $user = User::find($this->argument('id'));

        if (!$user) {
            $this->error("User not found.");
            return;
        }

        $user->update(array_filter([
            'name' => $this->argument('name') ?: $user->name,
            'email' => $this->argument('email') ?: $user->email,
            'password' => $this->argument('password') ? Hash::make($this->argument('password')) : $user->password,
        ]));

        $this->info("User {$user->name} updated successfully.");
    }
}
