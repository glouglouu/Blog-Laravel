<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    /**
     * Get the users that have this subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_subscriptions', 'subscription_id', 'user_id')
            ->withPivot('active', 'start_date', 'end_date');
    }
}

