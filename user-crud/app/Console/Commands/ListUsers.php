<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ListUsers extends Command
{
    protected $signature = 'user:list';
    protected $description = 'List all users';

    public function handle()
    {
        $users = User::all(['id', 'name', 'email']);

        if ($users->isEmpty()) {
            $this->info("No users found.");
        } else {
            $this->table(['ID', 'Name', 'Email'], $users);
        }
    }
}
