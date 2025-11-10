<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Role;

class UsersSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get premium subscription
        $premiumSubscription = Subscription::where('name', 'Premium')->first();
        
        if (!$premiumSubscription) {
            return;
        }

        // Get user role
        $userRole = Role::firstOrCreate(['name' => 'user']);
        
        // Create a test user with premium subscription
        $user = User::firstOrCreate(
            ['email' => 'premium@example.com'],
            [
                'name' => 'Premium User',
                'password' => bcrypt('password'),
                'role_id' => $userRole->id,
            ]
        );

        // Attach premium subscription
        $user->subscriptions()->attach($premiumSubscription, [
            'active' => true,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
        ]);
    }
}

