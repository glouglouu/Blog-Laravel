<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_show_page_can_be_rendered_for_free_post(): void
    {
        // Créer un rôle user
        $role = Role::firstOrCreate(['name' => 'user']);
        
        // Créer un utilisateur
        $user = User::factory()->create(['role_id' => $role->id]);
        
        // Créer un post gratuit publié
        $post = Post::factory()->create([
            'user_id' => $user->id,
            'is_published' => true,
            'paid' => false,
            'published_at' => now(),
        ]);

        // Tester l'accès en tant que visiteur non connecté
        $response = $this->get(route('posts.show', $post));

        $response->assertStatus(200);
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
        $response->assertSee($post->title);
    }

    public function test_post_show_page_displays_post_content(): void
    {
        $role = Role::firstOrCreate(['name' => 'user']);
        $user = User::factory()->create(['role_id' => $role->id]);
        
        $post = Post::factory()->create([
            'user_id' => $user->id,
            'is_published' => true,
            'paid' => false,
            'published_at' => now(),
        ]);

        $response = $this->get(route('posts.show', $post));

        $response->assertStatus(200);
        $response->assertSee($post->title, false);
        $response->assertSee($post->content, false);
        $response->assertSee($user->name, false);
    }

    public function test_paid_post_is_accessible_to_admin(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);
        
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $author = User::factory()->create(['role_id' => $userRole->id]);
        
        $post = Post::factory()->create([
            'user_id' => $author->id,
            'is_published' => true,
            'paid' => true,
            'published_at' => now(),
        ]);

        $response = $this->actingAs($admin)->get(route('posts.show', $post));

        $response->assertStatus(200);
        $response->assertSee($post->title, false);
    }

    public function test_paid_post_is_not_accessible_to_guest(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $author = User::factory()->create(['role_id' => $userRole->id]);
        
        $post = Post::factory()->create([
            'user_id' => $author->id,
            'is_published' => true,
            'paid' => true,
            'published_at' => now(),
        ]);

        $response = $this->get(route('posts.show', $post));

        // Les visiteurs non connectés sont redirigés vers la page de connexion
        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');
        $response->assertSessionHas('redirect_after_login');
    }

    public function test_unpublished_post_is_not_accessible_to_guest(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $author = User::factory()->create(['role_id' => $userRole->id]);
        
        $post = Post::factory()->create([
            'user_id' => $author->id,
            'is_published' => false,
            'paid' => false,
        ]);

        $response = $this->get(route('posts.show', $post));

        $response->assertRedirect(route('posts.index'));
    }

    public function test_unpublished_post_is_accessible_to_admin(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);
        
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $author = User::factory()->create(['role_id' => $userRole->id]);
        
        $post = Post::factory()->create([
            'user_id' => $author->id,
            'is_published' => false,
            'paid' => false,
        ]);

        $response = $this->actingAs($admin)->get(route('posts.show', $post));

        $response->assertStatus(200);
        $response->assertSee($post->title, false);
    }

    public function test_paid_post_redirects_user_without_subscription_to_subscriptions(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $user = User::factory()->create(['role_id' => $userRole->id]);
        $author = User::factory()->create(['role_id' => $userRole->id]);
        
        $post = Post::factory()->create([
            'user_id' => $author->id,
            'is_published' => true,
            'paid' => true,
            'published_at' => now(),
        ]);

        $response = $this->actingAs($user)->get(route('posts.show', $post));

        // L'utilisateur connecté sans abonnement est redirigé vers la page d'abonnements
        $response->assertRedirect(route('subscriptions.index'));
        $response->assertSessionHas('error');
        $response->assertSessionHas('redirect_after_subscription');
    }
}
