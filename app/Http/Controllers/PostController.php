<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load only published posts with their relations
        $posts = Post::where('is_published', true)
            ->with(['user', 'comments'])
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $post = Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Load necessary relations with eager loading
        $post->load(['user', 'comments.user']);

        // Check if the post is published
        if (!$post->is_published) {
            // Only admins can see unpublished posts
            if (!auth()->check() || !auth()->user()->hasRole('admin')) {
                return redirect()->route('posts.index')
                    ->with('error', 'Cet article n\'est pas encore publié.');
            }
        }

        // Free posts are accessible to everyone
        if (!$post->paid) {
            return view('posts.show', compact('post'));
        }

        // Paid posts require authentication and subscription
        // User not logged in
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté pour accéder aux articles premium.')
                ->with('redirect_after_login', route('posts.show', $post));
        }

        $user = auth()->user();
        
        // Load role relation if not already loaded
        if (!$user->relationLoaded('role')) {
            $user->load('role');
        }

        // Admins always have access
        if ($user->hasRole('admin')) {
            return view('posts.show', compact('post'));
        }

        // Check if the user has an active subscription
        $hasActiveSubscription = $user->hasActiveSubscription();
        
        // If the user has an active subscription, grant access
        if ($hasActiveSubscription) {
            return view('posts.show', compact('post'));
        }
        
        // User doesn't have an active subscription, redirect to subscriptions page
        return redirect()->route('subscriptions.index')
            ->with('error', 'Cet article est réservé aux abonnés premium. Abonnez-vous pour y accéder.')
            ->with('redirect_after_subscription', route('posts.show', $post));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        
        // Generate slug from title if not provided
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }
        
        // Update the post with validated data
        $post->update($data);

        return redirect()->route('posts.show', $post)
            ->with('success', 'L\'article a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete all comments associated with this post first
        $post->comments()->delete();
        
        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'L\'article a été supprimé avec succès.');
    }
}
