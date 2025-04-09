<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class CreateStoreOwnerAndStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the store owner user
        $storeOwner = User::create([
            'name' => 'Nizar',
            'email' => 'store@gmail.com',
            'password' => Hash::make(env('STORE_OWNER_PASSWORD', 'default_password')), // Use env variable
            'role' => 'store_owner',
        ]);

        // Create the store
        $store = Store::create([
            'name' => 'store1',
            'location' => 'abu abdo jucie',
            'contact_pages' => json_encode(['instagram' => 'https://www.instagram.com/yasmeenalshamjewelery/?hl=en']),
            'latitude' => '33.51932831353574',
            'longitude' => '36.317642780961926',
            'subscription_end_date' => '2026-03-17 00:00:00', // Format: YYYY-MM-DD HH:MM:SS
            'owner_id' => $storeOwner->id, // Link the store to the store owner
        ]);

        // Update the store owner's store_id
        $storeOwner->store_id = $store->id;
        $storeOwner->save();

        // Output the results
        $this->command->info('Store Owner and Store created successfully!');
        $this->command->info('Store Owner Details:');
        $this->command->info('ID: ' . $storeOwner->id);
        $this->command->info('Name: ' . $storeOwner->name);
        $this->command->info('Email: ' . $storeOwner->email);
        $this->command->info('Role: ' . $storeOwner->role);
        $this->command->info('Store ID: ' . $storeOwner->store_id);
        $this->command->info('Store Details:');
        $this->command->info('ID: ' . $store->id);
        $this->command->info('Name: ' . $store->name);
        $this->command->info('Location: ' . $store->location);
        $this->command->info('Owner ID: ' . $store->owner_id);
    }
}
