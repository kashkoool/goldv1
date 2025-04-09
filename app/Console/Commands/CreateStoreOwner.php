<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class CreateStoreOwner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:store-owner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a store owner and link them to an existing store';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ask for user details
        $name = $this->ask('Enter the store owner\'s name:');
        $email = $this->ask('Enter the store owner\'s email:');
        $password = $this->ask('Enter the store owner\'s password (leave blank to use default):');
        $password = $password ?: env('STORE_OWNER_PASSWORD', 'default_password');
        $storeId = $this->ask('Enter the store ID to link the owner to:');

        // Check if the user already exists
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            $this->error("A user with the email '$email' already exists.");
            return;
        }

        // Check if the store exists
        $store = Store::find($storeId);
        if (!$store) {
            $this->error("Store with ID '$storeId' does not exist.");
            return;
        }

        // Create the store owner user
        $storeOwner = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'store_owner',
            'store_id' => $store->id, // Link to the existing store
        ]);

        $this->info("Store Owner '$name' created successfully and linked to Store ID '$storeId'!");
    }
}
