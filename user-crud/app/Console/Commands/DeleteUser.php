<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUser extends Command
{
    protected $signature = 'user:delete {id}';
    protected $description = 'Delete an existing user';

    public function handle()
    {
        $user = User::find($this->argument('id'));

        if (!$user) {
            $this->error("User not found.");
            return;
        }

        $user->delete();
        $this->info("User {$user->name} deleted successfully.");
    }
}
