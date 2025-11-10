<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::firstOrCreate(
            ['name' => 'Free'],
            [
                'description' => 'Abonnement gratuit vous permettant de voir les articles gratuit mais non payants',
                'price' => 0,
            ]
        );
        
        Subscription::firstOrCreate(
            ['name' => 'Premium'],
            [
                'description' => 'Abonnement premium vous permettant de voir tous les articles payants',
                'price' => 3,
            ]
        );
    }
}

