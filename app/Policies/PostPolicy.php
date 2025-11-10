<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Post $post): bool
    {
        // Vérifier si le post est publié
        if (!$post->is_published) {
            // Seuls les admins peuvent voir les posts non publiés
            return $user && $user->hasRole('admin');
        }

        // Si le post est payant, vérifier les autorisations
        if ($post->paid) {
            // Les utilisateurs non connectés ne peuvent pas voir les posts payants
            if (!$user) {
                return false;
            }

            // Les admins peuvent toujours voir les posts payants
            if ($user->hasRole('admin')) {
                return true;
            }

            // Vérifier si l'utilisateur a un abonnement actif
            return $user->hasActiveSubscription();
        }

        // Les posts gratuits sont accessibles à tous
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        //
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        //
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
        return $user->hasRole('admin');
    }
}
