<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        
        // Get or create an admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'role_id' => $adminRole->id,
            ]
        );

        // Create sample posts
        Post::create([
            'title' => 'Premier article',
            'content' => 'Ceci est le contenu du premier article.',
            'slug' => 'premier-article',
            'user_id' => $admin->id,
            'is_published' => true,
            'published_at' => now(),
            'paid' => false,
        ]);

        Post::create([
            'title' => 'Article Premium',
            'content' => 'Ceci est un article premium réservé aux abonnés.',
            'slug' => 'article-premium',
            'user_id' => $admin->id,
            'is_published' => true,
            'published_at' => now(),
            'paid' => true,
        ]);
    }
}

