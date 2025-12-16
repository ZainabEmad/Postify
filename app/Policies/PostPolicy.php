<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->type == 'writer';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function postEdit(User $user, Post $post): bool
    {
        //
        return $user->id === $post->user_id || $user->type == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function viewHeaderElements(User $user): bool
    {
        //
        return $user->type === 'admin';
    }

}
