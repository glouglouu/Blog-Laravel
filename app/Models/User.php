<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the role associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        // Load role if not already loaded
        if (!$this->relationLoaded('role')) {
            $this->load('role');
        }
        
        return $this->role && $this->role->name === $role;
    }

    /**
     * Get the posts associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the subscriptions associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'users_subscriptions', 'user_id', 'subscription_id')
            ->withPivot('active', 'start_date', 'end_date');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Check if the user has an active subscription.
     *
     * @return bool
     */
    public function hasActiveSubscription(): bool
    {
        try {
            // Query directly with SQL conditions to handle boolean properly
            // SQLite stores booleans as 0 or 1, so we check for both
            $exists = DB::table('users_subscriptions')
                ->where('user_id', $this->id)
                ->where(function($query) {
                    // Handle different boolean formats (true, 1, '1')
                    $query->where('active', true)
                          ->orWhere('active', 1)
                          ->orWhere('active', '1');
                })
                ->where('end_date', '>=', now()->toDateTimeString())
                ->exists();
            
            return $exists;
        } catch (\Exception $e) {
            // In case of any error, return false
            return false;
        }
    }
}