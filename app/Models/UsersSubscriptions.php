<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersSubscriptions extends Model
{
    protected $fillable = ['user_id', 'subscription_id', 'start_date', 'end_date', 'active'];
}

